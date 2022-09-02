<?php
session_start();
require_once '../app/settings/config.php';
require_once('../app/settings/checklogin.php');
check_login();
require_once('../app/settings/codeGen.php');
require_once('../vendor/autoload.php');

$result_id = mysqli_real_escape_string($mysqli, $_GET['view']);

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$barcode = new \Com\Tecnick\Barcode\Barcode();



/* Get Results Details */
$tests_sql = mysqli_query(
    $mysqli,
    "SELECT *  FROM results r 
    INNER JOIN patient_tests pt ON r.results_test_id = pt.patient_test_id
    INNER JOIN tests t ON t.test_id = pt.patient_test_test_id
    INNER JOIN users u ON u.user_id = pt.patient_test_patient_id 
    WHERE result_id = '{$result_id}'"
);
if (mysqli_num_rows($tests_sql) > 0) {
    while ($tests = mysqli_fetch_array($tests_sql)) {
        $html = '<div style="margin:1px; page-break-after: always;">
            <style type="text/css">
                @media print {
                    .pagebreak { page-break-before: always; } /* page-break-after works, as well */
                }
                
                #b_border {
                    border-bottom: dashed thin;
                }
                .header {
                    margin-bottom: 20px;
                    width: 100%;
                    text-align: left;
                    position: absolute;
                    top: 0px;
                }
                .footer {
                    width: 100%;
                    text-align: center;
                    position: fixed;
                    bottom: 5px;
                    font-size: 60%;
                }
                .pagenum:before {
                    content: counter(page);
                }
                /* Thick Green border */
                hr {
                    border: 1px solid green dashed;
                }
                
                .list_header{
                    font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                }
                /* Patient */
                .patient_details{
                    float: left;
                    text-align:left;
                    width:50%;
                }

                /* Appointment Details */
                .appointment_details{
                    float: right;
                    text-align:right;
                    width:50%;
                }
                /* Letter Head */
                .letter_head{
                    color: green; 
                }
                .pagenum:before {
                    content: counter(page);
                }
                .invoice-box {
                    margin: auto;
                    padding: 30px;
                    border: 1px solid #006400;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                    font-size: 16px;
                    line-height: 24px;
                    font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                    color: #000;
                }
                .invoice-box table {
                    width: 100%;
                    line-height: inherit;
                    text-align: left;
                }
                .invoice-box table td {
                    padding: 5px;
                    vertical-align: top;
                }
                .invoice-box table tr td:nth-child(2) {
                    text-align: right;
                }
                .invoice-box table tr.top table td {
                    padding-bottom: 20px;
                }
                .invoice-box table tr.top table td.title {
                    font-size: 45px;
                    line-height: 45px;
                    color: #000;
                }
                .invoice-box table tr.information table td {
                    padding-bottom: 40px;
                }
                .invoice-box table tr.heading td {
                    background: #eee;
                    border-bottom: 1px solid #ddd;
                    font-weight: bold;
                }
                .invoice-box table tr.details td {
                    padding-bottom: 20px;
                }
                .invoice-box table tr.item td {
                    border-bottom: 1px solid #000;
                }
                .invoice-box table tr.item.last td {
                    border-bottom: none;
                }
                .invoice-box table tr.total td:nth-child(2) {
                    border-top: 2px;
                    font-weight: bold;
                }
                @media only screen and (max-width: 600px) {
                    .invoice-box table tr.top table td {
                        width: 100%;
                        display: block;
                        text-align: center;
                    }
                    .invoice-box table tr.information table td {
                        width: 100%;
                        display: block;
                        text-align: center;
                    }
                }
                /** RTL **/
                .invoice-box.rtl {
                    direction: rtl;
                    font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
                }
                .invoice-box.rtl table {
                    text-align: right;
                }
                .invoice-box.rtl table tr td:nth-child(2) {
                    text-align: left;
                }
                .center {
                    text-align: center;
                }
            </style>
            <div class="pagebreak">
            <div class="footer letter_head list_header">
                <hr>
                <b>Printed On ' . date('d M Y') . '</b>
            </div>
            <body>
                <h3 class="list_header letter_head" align="center">
                    Medical Laboratory Records Management System <br><br>
                    Report Number : ' . $a . $b . ' <br>
                </h3>
                <h3 class="list_header letter_head" align="center">
                    <hr style="width:100%" >
                </h3>
                <br>
                <div id="textbox">
                    <p class="patient_details list_header">
                        <b> Test               : </b>    ' . $tests['test_ref'] . ' ' . $tests['test_name'] . '<br>
                        <b> Patient Number     : </b>    ' . $tests['user_number'] . ' <br>
                        <b> Patient Full Names : </b>    ' . $tests['user_full_names'] . ' <br>
                        <b> Patient Contacts   : </b>    ' . $tests['user_phone_number'] . ' <br>
                        <b> Date Test Done     : </b>    ' . $tests['patient_test_date_created'] . ' 
                    </p>
                     ';
        /* Get Chief Lab Techician Details */
        $approver_sql = mysqli_query(
            $mysqli,
            "SELECT *  FROM users WHERE user_id = '{$tests['results_approved_by']}'"
        );
        if (mysqli_num_rows($approver_sql) > 0) {
            while ($chief_lab_tech = mysqli_fetch_array($approver_sql)) {
                $html .=
                    ' 
                                <p class="appointment_details list_header">
                                    <b> Date Released               : </b>    ' . $tests['results_date_realeased'] . '<br>
                                    <b> Approved By Number     : </b>    ' . $chief_lab_tech['user_number'] . ' <br>
                                    <b> Approved By Name : </b>    ' . $chief_lab_tech['user_full_names'] . ' <br>
                                    <b> Digital Signature Code : </b>    SGN-' . $paycode . ' <br>
                                </p>          
                            ';
            }
        } 
        $html .= ' 
                </div> 
                <br><br><br><br><br><br>
                
                <h3 class="list_header center letter_head" >
                    Tests Details <br>
                    <hr style="width:100%" >
                </h3>
                <p class="list_header">
                    ' . $tests['patient_test_description'] . '
                </p>

                <h3 class="list_header center letter_head" >
                    Results Details <br>
                    <hr style="width:100%" >
                </h3>
                <p class="list_header">
                    ' . $tests['results_details'] . '
                </p>
            </body>
        </div>
    </div>';
    }
}


$dompdf->load_html($html);
$canvas = $dompdf->getCanvas();
$w = $canvas->get_width();
$h = $canvas->get_height();
$imageURL = '../assets/images/avatars/watermark.jpg';
$imgWidth = 500;
$imgHeight = 500;
$canvas->set_opacity(.3);
$x = (($w - $imgWidth) / 2);
$y = (($h - $imgHeight) / 2);
$canvas->image($imageURL, $x, $y, $imgWidth, $imgHeight);
$dompdf->render();
$dompdf->stream('Laboratory Report ' . $a . $b, array("Attachment" => 1));
$options = $dompdf->getOptions();
$dompdf->set_paper('A4');
$dompdf->set_option('isHtml5ParserEnabled', true);
$options->setDefaultFont('');
$dompdf->setOptions($options);
