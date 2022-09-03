-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 03, 2022 at 06:43 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical_lab_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient_tests`
--

CREATE TABLE `patient_tests` (
  `patient_test_id` int(200) NOT NULL,
  `patient_test_test_id` int(200) NOT NULL,
  `patient_test_patient_id` int(200) NOT NULL,
  `patient_test_done_by` int(200) NOT NULL,
  `patient_test_date_created` varchar(200) NOT NULL,
  `patient_test_description` longtext NOT NULL,
  `patient_test_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_tests`
--

INSERT INTO `patient_tests` (`patient_test_id`, `patient_test_test_id`, `patient_test_patient_id`, `patient_test_done_by`, `patient_test_date_created`, `patient_test_description`, `patient_test_status`) VALUES
(5, 1, 6, 1, '01 Sep 2022', 'A DNA test (genetic testing) is a medical test that can identify mutations in your genes, chromosomes or proteins. These mutations can indicate if you have or don\'t have a genetic condition. DNA tests can also identify your risk for developing a certain condition or passing on a genetic disorder.', 1),
(6, 3, 2, 1, '01 Sep 2022', 'Blood typing. This is done before donating blood or having a blood transfusion, to check what your blood group is.  If you were given blood that didn\'t match your blood group, your immune system may attack the red blood cells, which could lead to potentially life-threatening complications.', 1),
(7, 3, 6, 1, '01 Sep 2022', 'Blood gases test.  A blood gases sample is taken from an artery, usually at the wrist. It\'s likely to be painful and is only carried out in hospital.  A blood gas test is used to check the balance of oxygen and carbon dioxide in your blood, and the balance of acid and alkali in your blood (the pH balance).', 1),
(8, 3, 2, 1, '01 Sep 2022', 'Blood cholesterol test Cholesterol is a fatty substance mostly created by the liver from the fatty foods in your diet and is vital for the normal functioning of the body.\r\nHaving a high level of cholesterol can contribute to an increased risk of serious problems such as heart attacks and strokes. Blood cholesterol levels can be measured with a simple blood test. You may be asked not to eat for 12 hours before the test (which usually includes when you\'re asleep) to ensure that all food is completely digested and won\'t affect the result, although this isn\'t always necessary.', 1),
(10, 5, 4, 1, '02 Sep 2022', 'Some blood will usually be taken from your arm with a needle.  This is sent to a lab to check your cholesterol level. You should get the result in a few days.\r\nYou might be asked not to eat anything for up to 12 hours before the test. But this is not always needed. The test can be done by pricking your finger. A drop of blood is put on a strip of paper. This is put into a machine that checks your cholesterol in a few minutes.', 1),
(11, 6, 16, 1, '02 Sep 2022', 'A blood sample taken from a vein in your arm or, for self-monitoring, a drop of blood from your finger. A few diabetic patients may use a continuous glucose monitor which is a small sensor wire inserted beneath the skin of the abdomen that measures blood glucose every five minutes.', 1),
(12, 1, 16, 13, '03 Sep 2022', ' Tests Details: A DNA test (genetic testing) is a medical test that can identify mutations in your genes, chromosomes or proteins. These mutations can indicate if you have or don\'t have a genetic condition. DNA tests can also identify your risk for developing a certain condition or passing on a genetic disorder. ', 1),
(13, 6, 2, 9, '03 Sep 2022', 'Patient requested a blood glucose test.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(200) NOT NULL,
  `results_test_id` int(200) NOT NULL,
  `results_details` longtext NOT NULL,
  `results_date_realeased` varchar(200) NOT NULL,
  `results_approved_by` int(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `results_test_id`, `results_details`, `results_date_realeased`, `results_approved_by`) VALUES
(5, 5, 'Prenatal diagnosis - used to detect changes in a fetus\'s genes or chromosomes before birth. This type of testing is offered to couples with an increased risk of having a baby with a genetic or chromosomal disorder. In some cases, prenatal testing can lessen a couple\'s uncertainty or help them decide whether to abort the pregnancy. It cannot identify all possible inherited disorders and birth defects, however. One method of performing a prenatal genetic test involves an amniocentesis, which removes a sample of fluid from the mother\'s amniotic sac 15 to 20 or more weeks into pregnancy. The fluid is then tested for chromosomal abnormalities such as Down syndrome (Trisomy 21) and Trisomy 18, which can result in neonatal or fetal death. Test results can be retrieved within 7–14 days after the test is done. This method is 99.4% accurate at detecting and diagnosing fetal chromosome abnormalities. There is a slight risk of miscarriage with this test, about 1:400. Another method of prenatal testing is Chorionic Villus Sampling (CVS). Chorionic villi are projections from the placenta that carry the same genetic makeup as the baby. During this method of prenatal testing, a sample of chorionic villi is removed from the placenta to be tested. This test is performed 10–13 weeks into pregnancy and results are ready 7–14 days after the test was done.[18] Another test using blood taken from the fetal umbilical cord is percutaneous umbilical cord blood sampling. Tests  turned 100% match from parent sample.', '02 Sep 2022', 1),
(6, 6, 'If the blood culture is positive, it may mean that there is a bacterial or fungal infection in the bloodstream that needs to be treated immediately. Sepsis can be life- threatening, especially in patients whose immune system is not working properly. The doctor may start treatment with a broad-spectrum antibiotic, often given intravenously, while waiting for the test results and will adjust the treatment depending on the antibiotic susceptibility results.\r\n\r\nA positive result could also be a false positive caused by skin contamination. If two or more blood culture sets are positive with the same bacteria, it is more likely that the bacteria found in the culture are causing the infection. If one set is positive and one set is negative, it could be either an infection or contamination. The doctor will need to evaluate the clinical state of the patient and the type of bacteria found.\r\n\r\nIf both blood culture sets are negative, the probability of sepsis caused by bacteria or yeasts is low. However, if symptoms persist, for example a fever that does not go away, additional tests may be required. Reasons that symptoms may not resolve even though blood culture results are negative include:\r\n\r\n    Some microorganisms are difficult to grow in culture. Additional blood cultures using special nutrient media may be done to try to grow and identify the pathogen\r\n    Viruses cannot be detected using blood culture bottles designed to grow bacteria. If the doctor suspects that a viral infection may be the cause of the person’s symptoms then other laboratory tests would need to be performed. The tests would depend on the clinical signs and the type of virus the doctor suspects is causing the infection.\r\n\r\nResults from other tests that may be done in conjunction with blood cultures can indicate sepsis even though blood cultures are negative. These include:\r\n\r\n    Full Blood Count: An increased white blood cell (WBC) count may indicate infection\r\n    Complement: Levels of C3 may be increased\r\n    A urine, sputum, CSF or wound culture may be positive, indicating a possible source of infection that may have spread to the blood\r\n    C-reactive protein and procalcitonin concentrations can increase in response to infection\r\n', '02 Sep 2022', 1),
(7, 7, 'If the blood culture is positive, it may mean that there is a bacterial or fungal infection in the bloodstream that needs to be treated immediately. Sepsis can be life- threatening, especially in patients whose immune system is not working properly. The doctor may start treatment with a broad-spectrum antibiotic, often given intravenously, while waiting for the test results and will adjust the treatment depending on the antibiotic susceptibility results.\r\n\r\nA positive result could also be a false positive caused by skin contamination. If two or more blood culture sets are positive with the same bacteria, it is more likely that the bacteria found in the culture are causing the infection. If one set is positive and one set is negative, it could be either an infection or contamination. The doctor will need to evaluate the clinical state of the patient and the type of bacteria found.\r\n\r\nIf both blood culture sets are negative, the probability of sepsis caused by bacteria or yeasts is low. However, if symptoms persist, for example a fever that does not go away, additional tests may be required. Reasons that symptoms may not resolve even though blood culture results are negative include:\r\n\r\n    Some microorganisms are difficult to grow in culture. Additional blood cultures using special nutrient media may be done to try to grow and identify the pathogen\r\n    Viruses cannot be detected using blood culture bottles designed to grow bacteria. If the doctor suspects that a viral infection may be the cause of the person’s symptoms then other laboratory tests would need to be performed. The tests would depend on the clinical signs and the type of virus the doctor suspects is causing the infection.\r\n\r\nResults from other tests that may be done in conjunction with blood cultures can indicate sepsis even though blood cultures are negative. These include:\r\n\r\n    Full Blood Count: An increased white blood cell (WBC) count may indicate infection\r\n    Complement: Levels of C3 may be increased\r\n    A urine, sputum, CSF or wound culture may be positive, indicating a possible source of infection that may have spread to the blood\r\n    C-reactive protein and procalcitonin concentrations can increase in response to infection\r\n\r\n', '02 Sep 2022', 1),
(8, 8, 'If the blood culture is positive, it may mean that there is a bacterial or fungal infection in the bloodstream that needs to be treated immediately. Sepsis can be life- threatening, especially in patients whose immune system is not working properly. The doctor may start treatment with a broad-spectrum antibiotic, often given intravenously, while waiting for the test results and will adjust the treatment depending on the antibiotic susceptibility results.\r\n\r\nA positive result could also be a false positive caused by skin contamination. If two or more blood culture sets are positive with the same bacteria, it is more likely that the bacteria found in the culture are causing the infection. If one set is positive and one set is negative, it could be either an infection or contamination. The doctor will need to evaluate the clinical state of the patient and the type of bacteria found.\r\n\r\nIf both blood culture sets are negative, the probability of sepsis caused by bacteria or yeasts is low. However, if symptoms persist, for example a fever that does not go away, additional tests may be required. Reasons that symptoms may not resolve even though blood culture results are negative include:\r\n\r\n    Some microorganisms are difficult to grow in culture. Additional blood cultures using special nutrient media may be done to try to grow and identify the pathogen\r\n    Viruses cannot be detected using blood culture bottles designed to grow bacteria. If the doctor suspects that a viral infection may be the cause of the person’s symptoms then other laboratory tests would need to be performed. The tests would depend on the clinical signs and the type of virus the doctor suspects is causing the infection.\r\n\r\nResults from other tests that may be done in conjunction with blood cultures can indicate sepsis even though blood cultures are negative. These include:\r\n\r\n    Full Blood Count: An increased white blood cell (WBC) count may indicate infection\r\n    Complement: Levels of C3 may be increased\r\n    A urine, sputum, CSF or wound culture may be positive, indicating a possible source of infection that may have spread to the blood\r\n    C-reactive protein and procalcitonin concentrations can increase in response to infection\r\n\r\n', '02 Sep 2022', 1),
(9, 10, '    total cholesterol – the overall amount of cholesterol in your blood, including both \"good\" and \"bad\" cholesterol.     total cholesterol to HDL cholesterol ratio (TC:HDL) – the level of good cholesterol in your blood compared to your overall cholesterol level.     good cholesterol (called HDL) – this makes you less likely to have heart problems or a stroke.     bad cholesterol (called LDL and non-HDL) – this makes you more likely to have heart problems or a stroke.     triglycerides – a fatty substance similar to bad cholesterol', '02 Sep 2022', 1),
(10, 11, 'A fasting blood sugar level of 99 mg/dL or lower is normal, 100 to 125 mg/dL indicates you have prediabetes, and 126 mg/dL or higher indicates you have diabetes.', '02 Sep 2022', 12),
(11, 12, ' Prenatal diagnosis - used to detect changes in a fetus\'s genes or chromosomes before birth. This type of testing is offered to couples with an increased risk of having a baby with a genetic or chromosomal disorder. In some cases, prenatal testing can lessen a couple\'s uncertainty or help them decide whether to abort the pregnancy. It cannot identify all possible inherited disorders and birth defects, however. One method of performing a prenatal genetic test involves an amniocentesis, which removes a sample of fluid from the mother\'s amniotic sac 15 to 20 or more weeks into pregnancy. The fluid is then tested for chromosomal abnormalities such as Down syndrome (Trisomy 21) and Trisomy 18, which can result in neonatal or fetal death. Test results can be retrieved within 7–14 days after the test is done. This method is 99.4% accurate at detecting and diagnosing fetal chromosome abnormalities. There is a slight risk of miscarriage with this test, about 1:400. Another method of prenatal testing is Chorionic Villus Sampling (CVS). Chorionic villi are projections from the placenta that carry the same genetic makeup as the baby. During this method of prenatal testing, a sample of chorionic villi is removed from the placenta to be tested. This test is performed 10–13 weeks into pregnancy and results are ready 7–14 days after the test was done.[18] Another test using blood taken from the fetal umbilical cord is percutaneous umbilical cord blood sampling. There is a mutational gene in patients sample which does not match with the parent gene.', '03 Sep 2022', 1),
(12, 13, ' A fasting blood sugar level of 99 mg/dL or lower is normal, 100 to 125 mg/dL indicates you have prediabetes, and 126 mg/dL or higher indicates you have diabetes. ', '03 Sep 2022', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(200) NOT NULL,
  `test_ref` varchar(200) NOT NULL,
  `test_name` longtext NOT NULL,
  `test_details` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `test_ref`, `test_name`, `test_details`) VALUES
(1, 'REF-01234YUREX', 'DNA Test', 'Genetic testing, also known as DNA testing, is used to identify changes in DNA sequence or chromosome structure. Genetic testing can also include measuring the results of genetic changes, such as RNA analysis as an output of gene expression, or through biochemical analysis to measure specific protein output. In a medical setting, genetic testing can be used to diagnose or rule out suspected genetic disorders, predict risks for specific conditions, or gain information that can be used to customize medical treatments based on an individual\'s genetic makeup. Genetic testing can also be used to determine biological relatives, such as a child\'s biological parentage (genetic mother and father) through DNA paternity testing, or be used to broadly predict an individual\'s ancestry. Genetic testing of plants and animals can be used for similar reasons as in humans (e.g. to assess relatedness/ancestry or predict/diagnose genetic disorders), to gain information used for selective breeding, or for efforts to boost genetic diversity in endangered populations.'),
(2, 'REF-07284YUREX', 'Blood gases test', 'A blood gases sample is taken from an artery, usually at the wrist. It\'s likely to be painful and is only carried out in hospital. A blood gas test is used to check the balance of oxygen and carbon dioxide in your blood, and the balance of acid and alkali in your blood (the pH balance).'),
(3, 'REF-07364YUREX', 'Blood culture', 'This involves taking a small sample of blood from a vein in your arm and from 1 or more other parts of your body.  The samples are combined with nutrients designed to encourage the growth of bacteria. This can help show whether any bacteria are present in your blood.  At least 2 samples are usually needed.'),
(5, 'REF-93052WKYAE', 'Blood cholesterol test', 'Cholesterol is a fatty substance mostly created by the liver from the fatty foods in your diet and is vital for the normal functioning of the body.  Having a high level of cholesterol can contribute to an increased risk of serious problems such as heart attacks and strokes.  Blood cholesterol levels can be measured with a simple blood test. You may be asked not to eat for 12 hours before the test (which usually includes when you\'re asleep) to ensure that all food is completely digested and won\'t affect the result, although this isn\'t always necessary.'),
(6, 'REF-71803VTCRF', 'Blood glucose (blood sugar) tests', 'A number of tests can be used to diagnose and monitor diabetes by checking the level of sugar (glucose) in the blood.  These include the:      fasting glucose test – where the level of glucose in your blood is checked after fasting (not eating or drinking anything other than water) for at least 8 hours     glucose tolerance test – where the level of glucose in your blood is checked after fasting, and again 2 hours later after being given a glucose drink     HbA1C test – a test done at your GP surgery or hospital to check your average blood sugar level over the past 3 months .Blood glucose test kits may be available to use at home. These only require a small \"pin prick\" of blood for testing. '),
(7, 'REF-86057EHZPX', 'Blood typing', 'This is done before donating blood or having a blood transfusion, to check what your blood group is. If you were given blood that didn\'t match your blood group, your immune system may attack the red blood cells, which could lead to potentially life-threatening complications. Blood typing is also used during pregnancy, as there\'s a small risk the unborn child may have a different blood group from their mother, which could lead to the mother\'s immune system attacking her baby\'s red blood cells. This is known as rhesus disease.'),
(8, 'REF-17435NIXDR', 'Cancer blood tests', 'A number of blood tests can be carried out to help diagnose certain cancers or check if you\'re at an increased risk of developing a particular type of cancer.'),
(9, 'REF-02854CVTLO', 'Chromosome testing (karyotyping)', 'This is a test to examine bundles of genetic material called chromosomes.  By counting the chromosomes (each cell should have 23 pairs) and checking their shape, it may be possible to detect genetic abnormalities.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(200) NOT NULL,
  `user_number` varchar(200) DEFAULT NULL,
  `user_full_names` varchar(200) DEFAULT NULL,
  `user_idno` varchar(200) DEFAULT NULL,
  `user_phone_number` varchar(200) DEFAULT NULL,
  `user_address` longtext DEFAULT NULL,
  `user_login_username` varchar(200) DEFAULT NULL,
  `user_login_password` varchar(200) DEFAULT NULL,
  `user_access_level` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_number`, `user_full_names`, `user_idno`, `user_phone_number`, `user_address`, `user_login_username`, `user_login_password`, `user_access_level`) VALUES
(1, '001', 'Dr James Doe Jnr', '123456789', '556342312412', '127, 01 Street, Localhost', 'jamesdoe', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Chief Lab Technician'),
(2, 'PT-SFWMN76841', 'Sonya Valentine', '123456789', '0737229776', '54-9865 Manhattan New York', 'soniavalentine', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Patient'),
(4, 'PT-KLUYE47892', 'Curtis Kellog', '1234567654', '33309876543', '54-9865 Manhattan New York', NULL, NULL, 'Patient'),
(5, 'PT-NXLZQ93261', 'Eric Sadler', '3455656787', '987654345678', '1644 Coffman Alley Louisville, Kentucky(KY), 40202', 'erlic908', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Patient'),
(6, 'PT-AECXT41987', 'Carlos Fornegra', '8887555324', '8765432345678', '4176 Twin Willow Lane Fayetteville, North Carolina(NC), 28301', 'carlos', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Patient'),
(9, 'PT-RAXUF72931', 'Kiera Cameron', '8877756455', '876545654323', '3544 Metz Lane Cambridge, Massachusetts(MA), 0214165', 'kieracameron90', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Receptionist'),
(10, 'PT-AJGVZ37845', 'Jasmine Garza', '557634345', '6543454432', '1211 Essex Court, South Burlington, Vermont(VT), 054036', 'jasmine.garza', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Receptionist'),
(12, 'BMNDK21056', 'Luvia Petersen', '34567876543', '2345678909876', '2887 Worthington Drive, Richardson, Texas(TX), 750816', 'luviapt80', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Lab Technician'),
(13, 'PLASF48073', 'Travis Verta', '5888792323', '09876543234', '3544 Metz Lane Cambridge, Massachusetts(MA), 021416', 'travverta', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Lab Technician'),
(14, 'UQZEA93741', 'Lucas Ingram', '44532324', '3456765432', '2887 Worthington Drive, Richardson, Texas(TX), 750816', 'lucas09d', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Chief Lab Technician'),
(16, 'PT-LUPMW08425', 'Julian Slink', '90776534', '543456765665', '3544 Metz Lane Cambridge, Massachusetts(MA), 021416', 'julian50', 'a69681bcf334ae130217fea4505fd3c994f5683f', 'Patient'),
(17, 'PT-HQWGB51482', 'Bobby Drapper', '09875674', '07123675444', '12, Driveway Haile Sellasie Avenue, Karen. Nairobi', NULL, NULL, 'Patient');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient_tests`
--
ALTER TABLE `patient_tests`
  ADD PRIMARY KEY (`patient_test_id`),
  ADD KEY `Test_To_Be_Done` (`patient_test_test_id`),
  ADD KEY `Tests_Done_By` (`patient_test_done_by`),
  ADD KEY `Tests_Belongs_to` (`patient_test_patient_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `Results_Belongs_To_Which_Test` (`results_test_id`),
  ADD KEY `Results_Approved_By` (`results_approved_by`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient_tests`
--
ALTER TABLE `patient_tests`
  MODIFY `patient_test_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient_tests`
--
ALTER TABLE `patient_tests`
  ADD CONSTRAINT `Test_To_Be_Done` FOREIGN KEY (`patient_test_test_id`) REFERENCES `tests` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Tests_Belongs_to` FOREIGN KEY (`patient_test_patient_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Tests_Done_By` FOREIGN KEY (`patient_test_done_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `Results_Approved_By` FOREIGN KEY (`results_approved_by`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Results_Belongs_To_Which_Test` FOREIGN KEY (`results_test_id`) REFERENCES `patient_tests` (`patient_test_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
