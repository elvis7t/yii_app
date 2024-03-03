SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `aliens_abduction` (
  `aa_id` int NOT NULL,
  `aa_firstname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aa_lastname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aa_whenithappened` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aa_howlong` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aa_howmany` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aa_aliendescription` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aa_whattheydid` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aa_fangspotted` enum('S','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `aa_email` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aa_other` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `aliens_abduction` (`aa_id`, `aa_firstname`, `aa_lastname`, `aa_whenithappened`, `aa_howlong`, `aa_howmany`, `aa_aliendescription`, `aa_whattheydid`, `aa_fangspotted`, `aa_email`, `aa_other`) VALUES
(1, 'aa_firstname', 'aa_lastname', 'aa_whenithappened', 'aa_howlong', 'aa_howmany', 'aa_aliendescription', 'aa_whattheydid', 'S', 'aa_email', 'aa_other');


ALTER TABLE `aliens_abduction`
  ADD PRIMARY KEY (`aa_id`);

ALTER TABLE `aliens_abduction`
  MODIFY `aa_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
