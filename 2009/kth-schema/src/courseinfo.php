<?php


// KURSER
$coursenames = array();
$coursenames['DD1334'] = 'Databasteknik';
$coursenames['UCK400'] = 'Utbildning i skola och samhälle';
$coursenames['DH2605'] = 'VTL II';
$coursenames['DH1601'] = 'Kommunikation och media';
$coursenames['KTD130'] = 'IT/Datadidaktik';
$coursenames['UDK200'] = 'Datadidaktik';
$coursenames['8X8000'] = 'Kansli CL/OPEN';
$coursenames['KTD130'] = 'IT/Datadidaktik';
$coursenames['UBK400'] = 'Identitetsskapande och socialisation';
$coursenames['SF1633'] = 'Diff I';
$coursenames['SF1637'] = 'Diff & Trans III';
$coursenames['DH2320'] = 'Introduktion till visualisering och datorgrafik';
$coursenames['UQK700'] = 'Specialpedagogiska utmaningar';
$coursenames['UCK700'] = 'Läraruppdraget och det professionella lärarskapet II';
// VT11
$coursenames['DH2641'] = 'Interaktionsprogrammering';
$coursenames['SF2717'] = 'Matematik fördjupning';
$coursenames['SF2719'] = 'Matematik historia';
$coursenames['DD2385'] = 'Programutvecklingsteknik';


// HT11
$coursenames['DH2622'] = 'Människa-datorinteraktion, forts. ';
$coursenames['DD1345'] = 'Grundläggande programmering och datalogi';

		   	

// MOMENT
$moments = array();
$moments['Ovn'] = 'Övn';
$moments['Frl'] = 'Frl';
$moments['Le'] = 'Lektion';
$moments['TEN'] = 'Tentamen';
$moments['Sem'] = 'Seminarium';
$moments['Lab'] = 'Labb';
$moments['RS'] = 'Räknestuga';
$moments['KS'] = 'Kontrollskrivning';



// FILTER
$filterCourse = array();

$filterCourse['DD2385'] = array('Lab', 'Ovn');




/*

	ADDITIONAL
*/

/*
//	DD1334 - Databasteknik
*/

// UQK700 Specialpedagogiska utmaningar
$extra['UQK700']['2011-08-31 08:00'] = '* 10.00-12.00 K-aula * Föreläsning Inger Assarson\n13.00-16.00 Z308 * Seminarium 1 Registrering kursintroduduktion'; 
$extra['UQK700']['2011-09-02 08:00'] = 'Studiegrupp/litteraturstudier'; 
$extra['UQK700']['2011-09-06 08:00'] = '* 10.00-12.00 K-aula * Föreläsning Mara Westling Allodi \n13.00-16.00 Z307 * Seminarium 2'; 
$extra['UQK700']['2011-09-09 08:00'] = 'Studiegrupp/litteraturstudier'; 
$extra['UQK700']['2011-09-13 08:00'] = '* 9.00-12.00 Z307 Seminarium 3'; 
$extra['UQK700']['2011-09-16 08:00'] = '10.00-12.00 Z307 * Föreläsning  Diana Berthén'; 
$extra['UQK700']['2011-09-20 08:00'] = '* 9.00-12.00 Z308 * Seminarium 4 \n13.00-15.00 Z308 * Föreläsning Mats Myhrberg'; 
$extra['UQK700']['2011-09-23 08:00'] = 'Litteraturstudier/Studiegrupp Förbereda VFU'; 
$extra['UQK700']['2011-09-27 08:00'] = ''; // VFU
$extra['UQK700']['2011-09-30 08:00'] = ''; // VFU
$extra['UQK700']['2011-10-04 08:00'] = ''; // VFU
$extra['UQK700']['2011-10-07 08:00'] = ''; // VFU
$extra['UQK700']['2011-10-11 08:00'] = '* 9.00-13.00 Z307 * Seminarium 5'; 
$extra['UQK700']['2011-10-14 08:00'] = '* 9.00-12.00 Z307 * Seminarium 6';



// SF1633 Diff I
$extra['SF1633']['2011-08-29 08:00'] = 'Modul 1'; 
$extra['SF1633']['2011-08-30 08:00'] = 'Modul 1'; 
$extra['SF1633']['2011-08-30 15:00'] = 'Modul 1'; 
$extra['SF1633']['2011-08-31 08:00'] = 'Modul 1'; 
$extra['SF1633']['2011-09-01 08:00'] = 'Modul 1'; 
$extra['SF1633']['2011-09-02 13:00'] = 'Modul 1'; 
$extra['SF1633']['2011-09-05 08:00'] = 'Modul 2'; 
$extra['SF1633']['2011-09-07 08:00'] = 'Modul 2'; 
$extra['SF1633']['2011-09-08 10:00'] = 'Modul 2'; 
$extra['SF1633']['2011-09-08 15:00'] = 'Modul 2'; 
$extra['SF1633']['2011-09-12 10:00'] = '* Kontrollskrivning 1'; 
$extra['SF1633']['2011-09-12 13:00'] = 'Modul 2'; 
$extra['SF1633']['2011-09-13 15:00'] = 'Modul 2'; 
$extra['SF1633']['2011-09-14 08:00'] = 'Modul 2'; 
$extra['SF1633']['2011-09-16 08:00'] = 'Modul 2'; 
$extra['SF1633']['2011-09-16 13:00'] = 'Modul 2'; 
$extra['SF1633']['2011-09-19 13:00'] = 'Modul 3'; 
$extra['SF1633']['2011-09-21 08:00'] = 'Modul 3'; 
$extra['SF1633']['2011-09-22 08:00'] = 'Modul 3'; 
$extra['SF1633']['2011-09-22 15:00'] = 'Modul 3'; 
$extra['SF1633']['2011-09-26 10:00'] = '* Kontrollskrivning 2'; 
$extra['SF1633']['2011-09-26 13:00'] = 'Modul 3'; 
$extra['SF1633']['2011-09-28 13:00'] = 'Modul 3'; 
$extra['SF1633']['2011-09-29 10:00'] = 'Modul 3'; 
$extra['SF1633']['2011-09-30 13:00'] = 'Modul 3'; 
$extra['SF1633']['2011-09-30 15:00'] = 'Modul 3'; 
$extra['SF1633']['2011-10-17 08:00'] = 'Tentamen'; 
$extra['SF1633']['2011-11-14 16:00'] = ''; // Kompletteringstentamen

// SF1637 DIff & Trans III
$extra['SF1637']['2011-10-03 13:00'] = 'Modul 3: Kap 1 och 2 i kompendiet. Fourier cosinus- och sinusserier. Fourierserier på komplex form. Fourierserier och periodiska signaler.'; 
$extra['SF1637']['2011-10-05 10:00'] = 'Modul 3: Kap 3 och 4 i kompendiet. Introduktion till Fouriertransformer och Fourierintegraler.'; 
$extra['SF1637']['2011-10-06 10:00'] = 'Modul 3: Kap 5 och 6 i kompendiet. Fouriertransformer och Fourierintegraler'; 
$extra['SF1637']['2011-10-12 10:00'] = 'Modul 3: Reserv/Repetition'; 
$extra['SF1637']['2011-10-13 13:00'] = 'Modul 3: Repetition av hela kursen'; 
$extra['SF1637']['2011-10-14 15:00'] = 'Modul 3: Repetition av hela kursen';




// UCK700 Läraruppdraget och det professionella lärarskapet II
$extra['UCK700']['2011-10-25 08:00'] = ''; 
$extra['UCK700']['2011-10-28 08:00'] = ''; 
$extra['UCK700']['2011-11-01 08:00'] = ''; 
$extra['UCK700']['2011-11-04 08:00'] = ''; 
$extra['UCK700']['2011-11-07 08:00'] = ''; // VFU
$extra['UCK700']['2011-11-08 08:00'] = ''; // VFU
$extra['UCK700']['2011-11-09 08:00'] = ''; // VFU
$extra['UCK700']['2011-11-10 08:00'] = ''; // VFU
$extra['UCK700']['2011-11-11 08:00'] = ''; // VFU
$extra['UCK700']['2011-11-15 08:00'] = ''; 
$extra['UCK700']['2011-11-18 08:00'] = ''; 
$extra['UCK700']['2011-11-22 08:00'] = ''; 
$extra['UCK700']['2011-11-25 08:00'] = ''; 
$extra['UCK700']['2011-11-29 08:00'] = ''; // VFU
$extra['UCK700']['2011-12-02 08:00'] = ''; // VFU
$extra['UCK700']['2011-12-06 08:00'] = ''; // VFU
$extra['UCK700']['2011-12-09 08:00'] = ''; // VFU




 // DH2622 MDI forts.
$extra['DH2622']['2011-10-25 13:00'] = ''; 
$extra['DH2622']['2011-11-01 13:00'] = ''; 
$extra['DH2622']['2011-11-08 13:00'] = ''; 
$extra['DH2622']['2011-11-15 13:00'] = ''; 
$extra['DH2622']['2011-11-22 13:00'] = ''; 
$extra['DH2622']['2011-11-29 13:00'] = ''; 
$extra['DH2622']['2011-12-06 13:00'] = ''; 
$extra['DH2622']['2011-12-12 10:00'] = ''; 
$extra['DH2622']['2011-12-15 14:00'] = ''; 


// DD2385 prutt12 labb-handledning
$extra['DD2385']['2012-05-11 08:00'] = '*'; 
$extra['DD2385']['2012-05-21 08:00'] = '*'; 

?>