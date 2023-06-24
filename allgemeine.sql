-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 02:05 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `allgemeine`
--
CREATE DATABASE IF NOT EXISTS `allgemeine` DEFAULT CHARACTER SET utf8 COLLATE utf8_croatian_ci;
USE `allgemeine`;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnickoIme` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnickoIme`, `lozinka`, `razina`) VALUES
(1, 'Denis', 'Ljubojević', 'Denis190802', '$2y$10$L4hPYLeRNVBjdYmj4ihJ1uGvC/HE2R1SaB1DUMhXuM4ba3lCqI/uu', 1),
(5, 'Janko', 'Janic', 'BigJanko', '$2y$10$l9IVvcNa8pjV3fdxUPw7fOp2m.b7RL/ebR3syZjWbgZRur/rGA08u', 0),
(8, 'Barbara', 'Čavić', 'Barbinjo', '$2y$10$t.6m1D.gcUN5IrRgqs5UUeAGj0rGtlleMUoMqyvxTmwhoyhxhrALW', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) DEFAULT NULL,
  `naslov` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci DEFAULT NULL,
  `sazetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci DEFAULT NULL,
  `tekst` text CHARACTER SET latin2 COLLATE latin2_croatian_ci DEFAULT NULL,
  `slika` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci DEFAULT NULL,
  `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci DEFAULT NULL,
  `arhiva` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(16, '27.05.2023.', 'Sozialdemokrat Timmermans will Kurzstreckenfloge abschaffen', 'Im letzten deutschen Fernsehduell vor der Europawahl spricht sich Frans Timmermans fur einen Ausbau der Bahnverbindungen in ganz Europa aus. Christdemokrat Manfred Weber ausert sich vorsichtiger. Uneins sind sie sich bei einem anderen Thema.', 'Im letzten deutschen Fernsehduell vor der Europawahl hat sich der Sozialdemokrat Frans Timmermans fur eine Abschaffung von Kurzstreckenflagen ausgesprochen. Allerdings musse es als Ersatz gute Bahnverbindungen geben, sagte der Niederlander am Donnerstagabend im ZDF. Sein christdemokratischer Kontrahent Manfred Weber fuserte sich etwas vorsichtiger.Er wolle Kurzstreckenfloge nicht gesetzlich abschaffen, sagte der CSU-Politiker. Doch pladierte auch er dafur, sie adurch eine gute Bahne zu ersetzen. Der Deutsche Weber, Vizechef der CSU, und der Niederl?nder Timmermans, bisher Vizeprasident der EU-Kommission, bewerben sich beide um die Nachfolge von EU-Kommissionschef Jean-Claude Juncker. Zunuchst kompfen sie jedoch darum, mit ihren Parteienfamilien im nuchsten Europaparlament die st?rkste Fraktion zu stellen. Die Europawahl ist vom 23. bis 26. Mai. Einig zeigten sich die beiden Spitzenkandidaten bei der Ablehnung der Atomkraft. Weber forderte einheitliche europaische Sicherheitsstandards fur Kernkraftwerke. Bisher liege dies in der Hand der nationalen Behorden. Die Zukunft liege ohnehin in einer eigenstandigen europaischen Energieversorgung durch erneuerbare Energien.', 'televizion.jpg', 'politik', 0),
(17, '27.05.2023.', 'Bundestag beschliest Bafog-Reform', 'Um den rackloufigen Zahlen der Bafog-Beziehenden entgegenzuwirken, beschliest der Bundestag eine Erhahung des Forderbetrages. Auch der Kreis der Empfonger erhoht sich. Ob die Maunahme die gewonschte Wirkung hat, wird jedoch bezweifelt.', 'Studenten und Scholer aus sozial schwachen Familien erhalten fur ihre Ausbildung konftig mehr staatliche Unterstatzung. Das sieht die Bafog-Reform vor, die der Bundestag am Donnerstagabend verabschiedet hat. Damit werden nicht nur die Fordersatze erhoht, sondern auch der Kreis der Bafog-Empfanger vergrusert sich. Dafur will die Bundesregierung allein in dieser Wahlperiode mehr als 1,2 Milliarden Euro zusatzlich ausgeben. Ab dem kommenden Wintersemester steigt der Furderhachstbetrag in zwei Stufen von 735 auf 861 Euro im Monat. Erleichtert wird daruber hinaus die Rackzahlung der Furdersumme, die bei einem Studium grundsatzlich zur Halfte als Darlehen gewohrt wird. Der Wohnzuschlag fur Studenten, die nicht mehr bei den Eltern leben, steigt von 250 auf 325 Euro. Angehoben werden auch die Freibetroge fur das Einkommen der Eltern, die fur den Bafog-Bezug entscheidend sind. Dadurch sollen mehr junge Menschen gefordert werden als bisher.Die Zahl der Bafog-Empf?nger sinkt seit Jahren. Im Jahr 2017 floss die staatliche Ausbildungshilfe nur noch an rund 557.000 Studenten sowie etwa 225.000 Sch?ler. Diesen Negativtrend will die Koalition nun umkehren. Die Opposition hat aber erhebliche Zweifel, dass dies mit der jetzt beschlossenen Baf?g-Novelle gelingt.', 'studenti.jpg', 'politik', 0),
(18, '27.05.2023.', 'Turkei hebt Besuchsverbot fur acalan-Anwolte auf', 'Acht Jahre verbrachte der Grunder der PKK in beinahe volliger Isolation. Nun hebt die turkische Regierung das seit Juli 2011 bestehende Kontaktverbot fur die Anwolte von Abdullah acalan wieder auf.', 'Nach rund acht Jahren in fast v?lliger Isolationshaft soll der Chef der verbotenen kurdischen Arbeiterpartei PKK, Abdullah ?calan, wieder regul?r seine Anw?lte sehen d?rfen. Justizminister Abdulhamit G?l sagte am Donnerstag, die diesbez?glichen Hindernisse seien aufgehoben worden und seine Anw?lte d?rften ?calan nun im Gef?ngnis auf der Insel Imrali besuchen.Seit Juli 2011 galt f?r sie ein Besuchsverbot. Anfang Mai durfte ?calan zwar seine Verteidiger empfangen, aber nur nach einmaliger Erlaubnis. Der PKK-F?hrer sitzt seit 1999 auf der Gef?ngnisinsel im Marmarameer eine lebenslange Freiheitsstrafe ab. Sein Bruder durfte ihn zuletzt im Januar besuchen. Die PKK k?mpft seit 1984 mit Waffengewalt und Anschl?gen f?r einen kurdischen Staat oder ein Autonomiegebiet im S?dosten der T?rkei. Inzwischen ist die PKK nach eigenen Angaben von der Maximalforderung eines unabh?ngigen Staates abger?ckt. Ein Waffenstillstand zwischen t?rkischer Regierung und PKK war im Sommer 2015 gescheitert.', 'pkk.jpg', 'politik', 0),
(19, '27.05.2023.', 'Kein Grund zur Freude', 'Das Al-Wakrah-Stadion sodlich von Doha ist den traditionellen Segelschiffen der Region nachempfunden. Amnesty International erinnert an die unmenschlichen Bedingungen, unter denen es errichtet wurde.', 'Mehr als drei Jahre vor der Fusball-WM hat Gastgeber Qatar das erste komplett neu gebaute Stadion eruffnet. Die Arena Al-Wakrah sodlich der Hauptstadt Doha bietet fast 40.000 Plutze, die am Donnerstagabend fast alle besetzt waren. Nach einer etwa 30-minutigen Eraffnungszeremonie spielte dort das Team Al-Sadd mit dem fr?heren spanischen Nationalspieler Xavi im Pokalfinale des Golfemirats gegen Al-Duhail. Das Spiel gewann Al Duhail mit 4:1. In der Arena werden WM-Spiele bis zum Viertelfinale ausgetragen. Nach dem Turnier soll der Oberrang abgebaut und damit die Kapazit?t auf 20.000 Zuschauer gesenkt werden. Insgesamt plant Qatar f?r die WM 2022 mit acht Stadien. Alle Stadien sind mit Klimaanlagen ausgestattet, um R?nge und Spielfeld bei Bedarf auf angenehme Temperaturen herunter zu k?hlen. Wegen der hei?en Sommertemperaturen wird die WM erstmals im November und Dezember ausgetragen.Die Baukosten beziffert das Emirat auf rund 5,8 Milliarden Euro. Das von der britisch-irakischen Architektin Zaha Hadid entworfene Al-Wakrah-Stadion ist den traditionellen Segelschiffen der Region, den Daus, nachempfunden. Er sei sehr beeindruckt von dem ?wundersch?nen Stadion?, sagte der fr?here niederl?ndische Nationalspieler Ronald de Boer vor Journalisten.', 'stadion.jpg', 'sport', 0),
(20, '27.05.2023.', 'Flensburg bleibt auf Kurs', 'Die SG Flensburg-Handewitt steckt die Niederlage gegen Kiel gut weg. Gegen Melsungen siegen die Norddeutschen souverun o und behaupten ihren Vorsprung in der Tabelle.', 'Unbeeindruckt von der zweiten Saison-Niederlage im Nordderby beim THW Kiel hat die SG Flensburg-Handewitt ihre Jagd nach dem dritten Meistertitel der Vereinsgeschichte erfolgreich fortgesetzt. Der Tabellenf?hrer der Handball-Bundesliga landete am Donnerstag vor heimischer Kulisse einen souver?nen 30:24 (14:8)-Sieg gegen die MT Melsungen und behauptete drei Spieltage vor Saisonende den Zwei-Punkte-Vorsprung vor Rekordmeister Kiel. Von Beginn an waren die Flensburger Herr im eigenen Haus. Mit einem 5:1-Blitzstart (7.) wurde der Grundstein f?r den Erfolg gelegt, der nie in Gefahr geriet und noch viel h?her h?tte ausfallen k?nnen. Zwischenzeitlich betrug der Vorsprung der SG sogar zehn Tore, in der Schlussphase wurde der Titelverteidiger jedoch etwas nachl?ssig. Beste Werfer beim Sieger waren Magnus J?ndal mit zehn Toren und Rasmus Lauge (7). Im Kampf gegen den Abstieg konnte die SG BBM Bietigheim nicht punkten. Der Tabellenvorletzte unterlag beim HC Erlangen mit 25:27 (12:12) und liegt damit weiter zwei Punkte hinter dem VfL Gummersbach auf dem rettenden 16. Platz. Die HSG Wetzlar kam bei Frisch Auf G?ppingen zu einem 24:22 (9:10)-Erfolg.', 'rukomet.jpg', 'sport', 0),
(21, '27.05.2023.', 'Die nochste Volte des FCK', 'Das Al-Wakrah-Stadion sodlich von Doha ist den traditionellen Segelschiffen der Region nachempfunden. Amnesty International erinnert an die unmenschlichen Bedingungen, unter denen es errichtet wurde.', 'Der Fu?ball-Drittligaklub 1. FC Kaiserslautern hat sich nach einer wochenlangen H?ngepartie auf eine Zusammenarbeit mit dem Luxemburger Unternehmer Flavio Becca geeinigt. Das teilte der Verein am Donnerstag mit. Somit kommt es auch nicht zu dem von Kreditgeber Quattrex angek?ndigten R?ckzug. Die wirtschaftliche Schieflage ist damit zun?chst korrigiert, die Lizenz f?r die kommende Drittliga-Spielzeit d?rfte gesichert sein. In einer Beiratssitzung am Donnerstag stimmte das f?nfk?pfige Gremium mit 3:2 Stimmen f?r einen Einstieg Beccas und gegen das Investment einer regionalen Investorengruppe. Michael Littig, Beiratsmitglied und Aufsichtsratsvorsitzender des e.V., trat daraufhin von seinen ?mtern zur?ck. Details und Inhalte der Kooperation zwischen Becca und dem FCK sind noch nicht bekannt. Vor rund zwei Wochen bot Becca dem Fritz-Walter-Club ein Darlehen ?ber 2,6 Millionen Euro und stellte bis zu 25 Millionen in den kommenden f?nf Jahren in Aussicht. Gleichzeitig stellte er jedoch die Forderung, Littig m?sse von seinen ?mtern zur?cktreten, weshalb der Deal zun?chst scheiterte. Ob diese Summen und die R?cktrittsforderung auch Teil des jetzt verhandelten Abkommens sind, ist noch unklar. Littig begr?ndete seine Entscheidung nun laut Vereinsmitteilung damit, ?dass er Ruhe in die Gremien bringen und einen wichtigen Beitrag zur Befriedung innerhalb des 1. FC Kaiserslautern leisten m?chte?.', 'inevestor.jpg', 'sport', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnickoIme` (`korisnickoIme`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
