-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Wrz 2021, 08:33
-- Wersja serwera: 10.4.20-MariaDB
-- Wersja PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `roboty`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roboty`
--

CREATE TABLE `roboty` (
  `id` int(255) NOT NULL,
  `numer_seryjny` varchar(6) NOT NULL,
  `kto_uzywa` text NOT NULL,
  `typ` text NOT NULL,
  `seria` text NOT NULL,
  `moc_nominalna` text NOT NULL,
  `calkowita_masa_robota` text NOT NULL,
  `maksymalne_obciazenie` text NOT NULL,
  `rok_produkcji` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `roboty`
--

INSERT INTO `roboty` (`id`, `numer_seryjny`, `kto_uzywa`, `typ`, `seria`, `moc_nominalna`, `calkowita_masa_robota`, `maksymalne_obciazenie`, `rok_produkcji`) VALUES
(15, '01B354', '', '', '', '', '', '', 0000),
(48, '123456', 'dsafasdfga', 'MOBOT AGV', 'TRANSPORTER U1', '0,4 kW', '110 kg', '100 kg', 2021),
(49, '234567', 'asdgfsad', 'adsgfdg', 'fdagafdg', 'afdgfdag', 'adfgafdg', 'afdgfdag', 2021);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roboty_elektronika`
--

CREATE TABLE `roboty_elektronika` (
  `id` int(255) NOT NULL,
  `model_naped` text NOT NULL,
  `nr_seryjny_naped` text NOT NULL,
  `uwagi_naped` text NOT NULL,
  `model_sterownik_silnika` text NOT NULL,
  `nr_seryjny_sterownik_silnika` text NOT NULL,
  `uwagi_sterownik_silnika` text NOT NULL,
  `model_sterownik_agv` text NOT NULL,
  `nr_seryjny_sterownik_agv` text NOT NULL,
  `uwagi_sterownik_agv` text NOT NULL,
  `model_plyta_mocy` text NOT NULL,
  `nr_seryjny_plyta_mocy` text NOT NULL,
  `uwagi_plyta_mocy` text NOT NULL,
  `model_sterownik_bezpieczenstwa` text NOT NULL,
  `nr_seryjny_sterownik_bezpieczenstwa` text NOT NULL,
  `uwagi_sterownik_bezpieczenstwa` text NOT NULL,
  `model_skanery_bezpieczenstwa` text NOT NULL,
  `nr_seryjny_skanery_bezpieczenstwa` text NOT NULL,
  `uwagi_skanery_bezpieczenstwa` text NOT NULL,
  `model_panel_przod` text NOT NULL,
  `nr_seryjny_panel_przod` text NOT NULL,
  `uwagi_panel_przod` text NOT NULL,
  `model_panel_tyl` text NOT NULL,
  `nr_seryjny_panel_tyl` text NOT NULL,
  `uwagi_panel_tyl` text NOT NULL,
  `model_router_wifi` text NOT NULL,
  `nr_seryjny_router_wifi` text NOT NULL,
  `uwagi_router_wifi` text NOT NULL,
  `model_switch_ethernet` text NOT NULL,
  `nr_seryjny_switch_ethernet` text NOT NULL,
  `uwagi_switch_ethernet` text NOT NULL,
  `model_czujnik_linii` text NOT NULL,
  `nr_seryjny_czujnik_linii` text NOT NULL,
  `uwagi_czujnik_linii` text NOT NULL,
  `model_czytnik_rfid` text NOT NULL,
  `nr_seryjny_czytnik_rfid` text NOT NULL,
  `uwagi_czytnik_rfid` text NOT NULL,
  `model_modul_komunikacji_radiowej` text NOT NULL,
  `nr_seryjny_modul_komunikacji_radiowej` text NOT NULL,
  `uwagi_modul_komunikacji_radiowej` text NOT NULL,
  `model_nawigacja_lms` text NOT NULL,
  `nr_seryjny_nawigacja_lms` text NOT NULL,
  `uwagi_nawigacja_lms` text NOT NULL,
  `model_glosniki` text NOT NULL,
  `nr_seryjny_glosniki` text NOT NULL,
  `uwagi_glosniki` text NOT NULL,
  `model_kierunkowskazy` text NOT NULL,
  `nr_seryjny_kierunkowskazy` text NOT NULL,
  `uwagi_kierunkowskazy` text NOT NULL,
  `model_zamontowane_bezpieczniki` text NOT NULL,
  `nr_seryjny_zamontowane_bezpieczniki` text NOT NULL,
  `uwagi_zamontowane_bezpieczniki` text NOT NULL,
  `model_akumulatory` text NOT NULL,
  `nr_seryjny_akumulatory` text NOT NULL,
  `uwagi_akumulatory` text NOT NULL,
  `model_stycznik_zlacza_io` text NOT NULL,
  `nr_seryjny_stycznik_zlacza_io` text NOT NULL,
  `uwagi_stycznik_zlacza_io` text NOT NULL,
  `model_stycznik_napedu` text NOT NULL,
  `nr_seryjny_stycznik_napedu` text NOT NULL,
  `uwagi_stycznik_napedu` text NOT NULL,
  `model_styk_pomocniczy` text NOT NULL,
  `nr_seryjny_styk_pomocniczy` text NOT NULL,
  `uwagi_styk_pomocniczy` text NOT NULL,
  `model_wylacznik_nadpradowy` text NOT NULL,
  `nr_seryjny_wylacznik_nadpradowy` text NOT NULL,
  `uwagi_wylacznik_nadpradowy` text NOT NULL,
  `model_rezystor` text NOT NULL,
  `nr_seryjny_rezystor` text NOT NULL,
  `uwagi_rezystor` text NOT NULL,
  `model_przetwornica_stabilizujaca` text NOT NULL,
  `nr_seryjny_przetwornica_stabilizujaca` text NOT NULL,
  `uwagi_przetwornica_stabilizujaca` text NOT NULL,
  `model_zabezpieczenie_akumulatorow` text NOT NULL,
  `nr_seryjny_zabezpieczenie_akumulatorow` text NOT NULL,
  `uwagi_zabezpieczenie_akumulatorow` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `roboty_elektronika`
--

INSERT INTO `roboty_elektronika` (`id`, `model_naped`, `nr_seryjny_naped`, `uwagi_naped`, `model_sterownik_silnika`, `nr_seryjny_sterownik_silnika`, `uwagi_sterownik_silnika`, `model_sterownik_agv`, `nr_seryjny_sterownik_agv`, `uwagi_sterownik_agv`, `model_plyta_mocy`, `nr_seryjny_plyta_mocy`, `uwagi_plyta_mocy`, `model_sterownik_bezpieczenstwa`, `nr_seryjny_sterownik_bezpieczenstwa`, `uwagi_sterownik_bezpieczenstwa`, `model_skanery_bezpieczenstwa`, `nr_seryjny_skanery_bezpieczenstwa`, `uwagi_skanery_bezpieczenstwa`, `model_panel_przod`, `nr_seryjny_panel_przod`, `uwagi_panel_przod`, `model_panel_tyl`, `nr_seryjny_panel_tyl`, `uwagi_panel_tyl`, `model_router_wifi`, `nr_seryjny_router_wifi`, `uwagi_router_wifi`, `model_switch_ethernet`, `nr_seryjny_switch_ethernet`, `uwagi_switch_ethernet`, `model_czujnik_linii`, `nr_seryjny_czujnik_linii`, `uwagi_czujnik_linii`, `model_czytnik_rfid`, `nr_seryjny_czytnik_rfid`, `uwagi_czytnik_rfid`, `model_modul_komunikacji_radiowej`, `nr_seryjny_modul_komunikacji_radiowej`, `uwagi_modul_komunikacji_radiowej`, `model_nawigacja_lms`, `nr_seryjny_nawigacja_lms`, `uwagi_nawigacja_lms`, `model_glosniki`, `nr_seryjny_glosniki`, `uwagi_glosniki`, `model_kierunkowskazy`, `nr_seryjny_kierunkowskazy`, `uwagi_kierunkowskazy`, `model_zamontowane_bezpieczniki`, `nr_seryjny_zamontowane_bezpieczniki`, `uwagi_zamontowane_bezpieczniki`, `model_akumulatory`, `nr_seryjny_akumulatory`, `uwagi_akumulatory`, `model_stycznik_zlacza_io`, `nr_seryjny_stycznik_zlacza_io`, `uwagi_stycznik_zlacza_io`, `model_stycznik_napedu`, `nr_seryjny_stycznik_napedu`, `uwagi_stycznik_napedu`, `model_styk_pomocniczy`, `nr_seryjny_styk_pomocniczy`, `uwagi_styk_pomocniczy`, `model_wylacznik_nadpradowy`, `nr_seryjny_wylacznik_nadpradowy`, `uwagi_wylacznik_nadpradowy`, `model_rezystor`, `nr_seryjny_rezystor`, `uwagi_rezystor`, `model_przetwornica_stabilizujaca`, `nr_seryjny_przetwornica_stabilizujaca`, `uwagi_przetwornica_stabilizujaca`, `model_zabezpieczenie_akumulatorow`, `nr_seryjny_zabezpieczenie_akumulatorow`, `uwagi_zabezpieczenie_akumulatorow`) VALUES
(15, 'BG75x50PI', 'R:019C2F\r\nL:019C31', 'jakas uwaga', '-', '-', '-', 'AGV2X-MB v10b 2016', '0369E5', '-', 'POWERC v.21', '036A2B', '-', 'PILZ PNOZ mm0p 772000', '036A2D', '-', 'UAM-02LP-T302X', 'PRZÓD:H1509460C\r\nTYŁ:H1509610C', '-', 'AGV2X-EXTCON1', 'Mechanika:036A1E\r\nPanel HMI: MT4414TE:\r\n02528C', '-', 'AGV2X-EXTCON1', 'Mechanika:034BD3', '-', 'MikroTik Metal 52', '037010', '-', '-', '-', '-', 'Kamera PGV100-F200-R4-V19', '0369E8; 0369E6', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'obrysówki diodowe 2LED', '4 szt.', '-', '-', '-', '-', '12NXS90', 'A:0369EB, 0369ED;\r\nB:0369EA, 0369E9', '-', '-', '-', '-', 'RIC40-220/UC24V', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'TRACO POWER TCL-060-124 DC0', '0369E0', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roboty_formularz`
--

CREATE TABLE `roboty_formularz` (
  `id` int(255) NOT NULL,
  `zglaszajacy_serwis` text NOT NULL,
  `adres_firmy` text NOT NULL,
  `osoba_zglaszajaca` text NOT NULL,
  `tel` text NOT NULL,
  `przyjecie_zgloszenia` text NOT NULL,
  `serwisowal` text NOT NULL,
  `rozpoczecie_serwisu` text NOT NULL,
  `przyczyna` text NOT NULL,
  `sposob_zalatwienia_sprawy` text NOT NULL,
  `zuzyte_materialy` text NOT NULL,
  `ilosc_roboczogodzin` text NOT NULL,
  `liczba_km` text NOT NULL,
  `czas` text NOT NULL,
  `uwagi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `roboty_formularz`
--

INSERT INTO `roboty_formularz` (`id`, `zglaszajacy_serwis`, `adres_firmy`, `osoba_zglaszajaca`, `tel`, `przyjecie_zgloszenia`, `serwisowal`, `rozpoczecie_serwisu`, `przyczyna`, `sposob_zalatwienia_sprawy`, `zuzyte_materialy`, `ilosc_roboczogodzin`, `liczba_km`, `czas`, `uwagi`) VALUES
(48, '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roboty_mechanika`
--

CREATE TABLE `roboty_mechanika` (
  `id` int(255) NOT NULL,
  `model_przekladnia` text NOT NULL,
  `nr_seryjny_przekladnia` text NOT NULL,
  `uwagi_przekladnia` text NOT NULL,
  `model_trzpienie` text NOT NULL,
  `nr_seryjny_trzpienie` text NOT NULL,
  `uwagi_trzpienie` text NOT NULL,
  `model_ladowarka_stykowa` text NOT NULL,
  `nr_seryjny_ladowarka_stykowa` text NOT NULL,
  `uwagi_ladowarka_stykowa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `roboty_mechanika`
--

INSERT INTO `roboty_mechanika` (`id`, `model_przekladnia`, `nr_seryjny_przekladnia`, `uwagi_przekladnia`, `model_trzpienie`, `nr_seryjny_trzpienie`, `uwagi_trzpienie`, `model_ladowarka_stykowa`, `nr_seryjny_ladowarka_stykowa`, `uwagi_ladowarka_stykowa`) VALUES
(15, 'Neugart PLFN064-064-SSSE3AD-R8', 'R:034CE2\r\nL:019D4F', '-', 'Płyta sterująca: AGV PINC v10', 'Mechanika:\r\nPRZÓD:037014\r\nTYŁ:036A45\r\nElektronika:\r\nPRZÓD:036A20\r\nTYŁ:0369CE', 'jakas uwaga', '-', '-', '-');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roboty_oprogramowanie`
--

CREATE TABLE `roboty_oprogramowanie` (
  `id` int(255) NOT NULL,
  `typ_naped` text NOT NULL,
  `wersja_programu_naped` text NOT NULL,
  `data_programu_naped` text NOT NULL,
  `zalacznik_naped` text NOT NULL,
  `typ_sterownik_silnika` text NOT NULL,
  `wersja_programu_sterownik_silnika` text NOT NULL,
  `data_programu_sterownik_silnika` text NOT NULL,
  `zalacznik_sterownik_silnika` text NOT NULL,
  `typ_sterownik_agv` text NOT NULL,
  `wersja_programu_sterownik_agv` text NOT NULL,
  `data_programu_sterownik_agv` text NOT NULL,
  `zalacznik_sterownik_agv` text NOT NULL,
  `typ_plyta_mocy` text NOT NULL,
  `wersja_programu_plyta_mocy` text NOT NULL,
  `data_programu_plyta_mocy` text NOT NULL,
  `zalacznik_plyta_mocy` text NOT NULL,
  `typ_sterownik_bezpieczenstwa` text NOT NULL,
  `wersja_programu_sterownik_bezpieczenstwa` text NOT NULL,
  `data_programu_sterownik_bezpieczenstwa` text NOT NULL,
  `zalacznik_sterownik_bezpieczenstwa` text NOT NULL,
  `typ_skanery_bezpieczenstwa` text NOT NULL,
  `wersja_programu_skanery_bezpieczenstwa` text NOT NULL,
  `data_programu_skanery_bezpieczenstwa` text NOT NULL,
  `zalacznik_skanery_bezpieczenstwa` text NOT NULL,
  `typ_panel_przod` text NOT NULL,
  `wersja_programu_panel_przod` text NOT NULL,
  `data_programu_panel_przod` text NOT NULL,
  `zalacznik_panel_przod` text NOT NULL,
  `typ_panel_tyl` text NOT NULL,
  `wersja_programu_panel_tyl` text NOT NULL,
  `data_programu_panel_tyl` text NOT NULL,
  `zalacznik_panel_tyl` text NOT NULL,
  `typ_router_wifi` text NOT NULL,
  `wersja_programu_router_wifi` text NOT NULL,
  `data_programu_router_wifi` text NOT NULL,
  `zalacznik_router_wifi` text NOT NULL,
  `typ_switch_ethernet` text NOT NULL,
  `wersja_programu_switch_ethernet` text NOT NULL,
  `data_programu_switch_ethernet` text NOT NULL,
  `zalacznik_switch_ethernet` text NOT NULL,
  `typ_czujnik_linii` text NOT NULL,
  `wersja_programu_czujnik_linii` text NOT NULL,
  `data_programu_czujnik_linii` text NOT NULL,
  `zalacznik_czujnik_linii` text NOT NULL,
  `typ_czytnik_rfid` text NOT NULL,
  `wersja_programu_czytnik_rfid` text NOT NULL,
  `data_programu_czytnik_rfid` text NOT NULL,
  `zalacznik_czytnik_rfid` text NOT NULL,
  `typ_modul_komunikacji_radiowej` text NOT NULL,
  `wersja_programu_modul_komunikacji_radiowej` text NOT NULL,
  `data_programu_modul_komunikacji_radiowej` text NOT NULL,
  `zalacznik_modul_komunikacji_radiowej` text NOT NULL,
  `typ_nawigacja_lms` text NOT NULL,
  `wersja_programu_nawigacja_lms` text NOT NULL,
  `data_programu_nawigacja_lms` text NOT NULL,
  `zalacznik_nawigacja_lms` text NOT NULL,
  `typ_glosniki` text NOT NULL,
  `wersja_programu_glosniki` text NOT NULL,
  `data_programu_glosniki` text NOT NULL,
  `zalacznik_glosniki` text NOT NULL,
  `typ_kierunkowskazy` text NOT NULL,
  `wersja_programu_kierunkowskazy` text NOT NULL,
  `data_programu_kierunkowskazy` text NOT NULL,
  `zalacznik_kierunkowskazy` text NOT NULL,
  `typ_zamontowane_bezpieczniki` text NOT NULL,
  `wersja_programu_zamontowane_bezpieczniki` text NOT NULL,
  `data_programu_zamontowane_bezpieczniki` text NOT NULL,
  `zalacznik_zamontowane_bezpieczniki` text NOT NULL,
  `typ_akumulatory` text NOT NULL,
  `wersja_programu_akumulatory` text NOT NULL,
  `data_programu_akumulatory` text NOT NULL,
  `zalacznik_akumulatory` text NOT NULL,
  `typ_stycznik_zlacza_io` text NOT NULL,
  `wersja_programu_stycznik_zlacza_io` text NOT NULL,
  `data_programu_stycznik_zlacza_io` text NOT NULL,
  `zalacznik_stycznik_zlacza_io` text NOT NULL,
  `typ_stycznik_napedu` text NOT NULL,
  `wersja_programu_stycznik_napedu` text NOT NULL,
  `data_programu_stycznik_napedu` text NOT NULL,
  `zalacznik_stycznik_napedu` text NOT NULL,
  `typ_styk_pomocniczy` text NOT NULL,
  `wersja_programu_styk_pomocniczy` text NOT NULL,
  `data_programu_styk_pomocniczy` text NOT NULL,
  `zalacznik_styk_pomocniczy` text NOT NULL,
  `typ_wylacznik_nadpradowy` text NOT NULL,
  `wersja_programu_wylacznik_nadpradowy` text NOT NULL,
  `data_programu_wylacznik_nadpradowy` text NOT NULL,
  `zalacznik_wylacznik_nadpradowy` text NOT NULL,
  `typ_rezystor` text NOT NULL,
  `wersja_programu_rezystor` text NOT NULL,
  `data_programu_rezystor` text NOT NULL,
  `zalacznik_rezystor` text NOT NULL,
  `typ_przetwornica_stabilizujaca` text NOT NULL,
  `wersja_programu_przetwornica_stabilizujaca` text NOT NULL,
  `data_programu_przetwornica_stabilizujaca` text NOT NULL,
  `zalacznik_przetwornica_stabilizujaca` text NOT NULL,
  `typ_zabezpieczenie_akumulatorow` text NOT NULL,
  `wersja_programu_zabezpieczenie_akumulatorow` text NOT NULL,
  `data_programu_zabezpieczenie_akumulatorow` text NOT NULL,
  `zalacznik_zabezpieczenie_akumulatorow` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `roboty_oprogramowanie`
--

INSERT INTO `roboty_oprogramowanie` (`id`, `typ_naped`, `wersja_programu_naped`, `data_programu_naped`, `zalacznik_naped`, `typ_sterownik_silnika`, `wersja_programu_sterownik_silnika`, `data_programu_sterownik_silnika`, `zalacznik_sterownik_silnika`, `typ_sterownik_agv`, `wersja_programu_sterownik_agv`, `data_programu_sterownik_agv`, `zalacznik_sterownik_agv`, `typ_plyta_mocy`, `wersja_programu_plyta_mocy`, `data_programu_plyta_mocy`, `zalacznik_plyta_mocy`, `typ_sterownik_bezpieczenstwa`, `wersja_programu_sterownik_bezpieczenstwa`, `data_programu_sterownik_bezpieczenstwa`, `zalacznik_sterownik_bezpieczenstwa`, `typ_skanery_bezpieczenstwa`, `wersja_programu_skanery_bezpieczenstwa`, `data_programu_skanery_bezpieczenstwa`, `zalacznik_skanery_bezpieczenstwa`, `typ_panel_przod`, `wersja_programu_panel_przod`, `data_programu_panel_przod`, `zalacznik_panel_przod`, `typ_panel_tyl`, `wersja_programu_panel_tyl`, `data_programu_panel_tyl`, `zalacznik_panel_tyl`, `typ_router_wifi`, `wersja_programu_router_wifi`, `data_programu_router_wifi`, `zalacznik_router_wifi`, `typ_switch_ethernet`, `wersja_programu_switch_ethernet`, `data_programu_switch_ethernet`, `zalacznik_switch_ethernet`, `typ_czujnik_linii`, `wersja_programu_czujnik_linii`, `data_programu_czujnik_linii`, `zalacznik_czujnik_linii`, `typ_czytnik_rfid`, `wersja_programu_czytnik_rfid`, `data_programu_czytnik_rfid`, `zalacznik_czytnik_rfid`, `typ_modul_komunikacji_radiowej`, `wersja_programu_modul_komunikacji_radiowej`, `data_programu_modul_komunikacji_radiowej`, `zalacznik_modul_komunikacji_radiowej`, `typ_nawigacja_lms`, `wersja_programu_nawigacja_lms`, `data_programu_nawigacja_lms`, `zalacznik_nawigacja_lms`, `typ_glosniki`, `wersja_programu_glosniki`, `data_programu_glosniki`, `zalacznik_glosniki`, `typ_kierunkowskazy`, `wersja_programu_kierunkowskazy`, `data_programu_kierunkowskazy`, `zalacznik_kierunkowskazy`, `typ_zamontowane_bezpieczniki`, `wersja_programu_zamontowane_bezpieczniki`, `data_programu_zamontowane_bezpieczniki`, `zalacznik_zamontowane_bezpieczniki`, `typ_akumulatory`, `wersja_programu_akumulatory`, `data_programu_akumulatory`, `zalacznik_akumulatory`, `typ_stycznik_zlacza_io`, `wersja_programu_stycznik_zlacza_io`, `data_programu_stycznik_zlacza_io`, `zalacznik_stycznik_zlacza_io`, `typ_stycznik_napedu`, `wersja_programu_stycznik_napedu`, `data_programu_stycznik_napedu`, `zalacznik_stycznik_napedu`, `typ_styk_pomocniczy`, `wersja_programu_styk_pomocniczy`, `data_programu_styk_pomocniczy`, `zalacznik_styk_pomocniczy`, `typ_wylacznik_nadpradowy`, `wersja_programu_wylacznik_nadpradowy`, `data_programu_wylacznik_nadpradowy`, `zalacznik_wylacznik_nadpradowy`, `typ_rezystor`, `wersja_programu_rezystor`, `data_programu_rezystor`, `zalacznik_rezystor`, `typ_przetwornica_stabilizujaca`, `wersja_programu_przetwornica_stabilizujaca`, `data_programu_przetwornica_stabilizujaca`, `zalacznik_przetwornica_stabilizujaca`, `typ_zabezpieczenie_akumulatorow`, `wersja_programu_zabezpieczenie_akumulatorow`, `data_programu_zabezpieczenie_akumulatorow`, `zalacznik_zabezpieczenie_akumulatorow`) VALUES
(49, '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', '-', '-', '-', '', 'ASDF', '-', '-', '', '-', '-', 'SADF', '', '-', '-', '-', '', 'DSAF', '-', '-', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roboty_test_a`
--

CREATE TABLE `roboty_test_a` (
  `id` int(11) NOT NULL,
  `data` text NOT NULL,
  `miejsce_badania` text NOT NULL,
  `uczestnicy_badania` text NOT NULL,
  `numer_vin_1` text NOT NULL,
  `numer_vin_2` text NOT NULL,
  `skaner_1` text NOT NULL,
  `skaner_1_nr_seryjny` text NOT NULL,
  `skaner_2` text NOT NULL,
  `skaner_2_nr_seryjny` text NOT NULL,
  `numer_rysunku` text NOT NULL,
  `numer_schematu_elektrycznego` text NOT NULL,
  `rok_produkcji` year(4) NOT NULL,
  `maksymalna_predkosc` text NOT NULL,
  `maksymalne_obciazenie` text NOT NULL,
  `maksymalne_dopuszczalne_obciazenie` text NOT NULL,
  `podloze` text NOT NULL,
  `pola_detekcji` text NOT NULL,
  `inne` text NOT NULL,
  `probka_testowa` text NOT NULL,
  `wymiary_probki` text NOT NULL,
  `umiejscowienie_probki` text NOT NULL,
  `sila_uruchamiajaca` text NOT NULL,
  `uzyte_przyrzady` text NOT NULL,
  `sposob_wykonania_testu` text NOT NULL,
  `uwagi_1` text NOT NULL,
  `skaner_1_2_lewa` text NOT NULL,
  `predkosc_wozka_lewa` text NOT NULL,
  `obciazenie_wozka_lewa` text NOT NULL,
  `nachylenie_powierzchni_lewa` text NOT NULL,
  `wykryta_przez_skaner_lewa_pomiar_1` text NOT NULL,
  `wykryta_przez_skaner_lewa_pomiar_2` text NOT NULL,
  `wykryta_przez_skaner_lewa_pomiar_3` text NOT NULL,
  `zatrzymanie_wozka_lewa_pomiar_1` text NOT NULL,
  `zatrzymanie_wozka_lewa_pomiar_2` text NOT NULL,
  `zatrzymanie_wozka_lewa_pomiar_3` text NOT NULL,
  `droga_hamowania_lewa_pomiar_1` text NOT NULL,
  `droga_hamowania_lewa_pomiar_2` text NOT NULL,
  `droga_hamowania_lewa_pomiar_3` text NOT NULL,
  `skaner_1_skaner_2_srodek` text NOT NULL,
  `predkosc_wozka_srodek` text NOT NULL,
  `obciazenie_wozka_srodek` text NOT NULL,
  `nachylenie_powierzchni_srodek` text NOT NULL,
  `wykryta_przez_skaner_srodek_pomiar_1` text NOT NULL,
  `wykryta_przez_skaner_srodek_pomiar_2` text NOT NULL,
  `wykryta_przez_skaner_srodek_pomiar_3` text NOT NULL,
  `zatrzymanie_wozka_srodek_pomiar_1` text NOT NULL,
  `zatrzymanie_wozka_srodek_pomiar_2` text NOT NULL,
  `zatrzymanie_wozka_srodek_pomiar_3` text NOT NULL,
  `droga_hamowania_srodek_pomiar_1` text NOT NULL,
  `droga_hamowania_srodek_pomiar_2` text NOT NULL,
  `droga_hamowania_srodek_pomiar_3` text NOT NULL,
  `skaner_1_skaner_2_prawa` text NOT NULL,
  `predkosc_wozka_prawa` text NOT NULL,
  `obciazenie_wozka_prawa` text NOT NULL,
  `nachylenie_powierzchni_prawa` text NOT NULL,
  `wykryta_przez_skaner_prawa_pomiar_1` text NOT NULL,
  `wykryta_przez_skaner_prawa_pomiar_2` text NOT NULL,
  `wykryta_przez_skaner_prawa_pomiar_3` text NOT NULL,
  `zatrzymanie_wozka_prawa_pomiar_1` text NOT NULL,
  `zatrzymanie_wozka_prawa_pomiar_2` text NOT NULL,
  `zatrzymanie_wozka_prawa_pomiar_3` text NOT NULL,
  `droga_hamowania_prawa_pomiar_1` text NOT NULL,
  `droga_hamowania_prawa_pomiar_2` text NOT NULL,
  `droga_hamowania_prawa_pomiar_3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `roboty_test_a`
--

INSERT INTO `roboty_test_a` (`id`, `data`, `miejsce_badania`, `uczestnicy_badania`, `numer_vin_1`, `numer_vin_2`, `skaner_1`, `skaner_1_nr_seryjny`, `skaner_2`, `skaner_2_nr_seryjny`, `numer_rysunku`, `numer_schematu_elektrycznego`, `rok_produkcji`, `maksymalna_predkosc`, `maksymalne_obciazenie`, `maksymalne_dopuszczalne_obciazenie`, `podloze`, `pola_detekcji`, `inne`, `probka_testowa`, `wymiary_probki`, `umiejscowienie_probki`, `sila_uruchamiajaca`, `uzyte_przyrzady`, `sposob_wykonania_testu`, `uwagi_1`, `skaner_1_2_lewa`, `predkosc_wozka_lewa`, `obciazenie_wozka_lewa`, `nachylenie_powierzchni_lewa`, `wykryta_przez_skaner_lewa_pomiar_1`, `wykryta_przez_skaner_lewa_pomiar_2`, `wykryta_przez_skaner_lewa_pomiar_3`, `zatrzymanie_wozka_lewa_pomiar_1`, `zatrzymanie_wozka_lewa_pomiar_2`, `zatrzymanie_wozka_lewa_pomiar_3`, `droga_hamowania_lewa_pomiar_1`, `droga_hamowania_lewa_pomiar_2`, `droga_hamowania_lewa_pomiar_3`, `skaner_1_skaner_2_srodek`, `predkosc_wozka_srodek`, `obciazenie_wozka_srodek`, `nachylenie_powierzchni_srodek`, `wykryta_przez_skaner_srodek_pomiar_1`, `wykryta_przez_skaner_srodek_pomiar_2`, `wykryta_przez_skaner_srodek_pomiar_3`, `zatrzymanie_wozka_srodek_pomiar_1`, `zatrzymanie_wozka_srodek_pomiar_2`, `zatrzymanie_wozka_srodek_pomiar_3`, `droga_hamowania_srodek_pomiar_1`, `droga_hamowania_srodek_pomiar_2`, `droga_hamowania_srodek_pomiar_3`, `skaner_1_skaner_2_prawa`, `predkosc_wozka_prawa`, `obciazenie_wozka_prawa`, `nachylenie_powierzchni_prawa`, `wykryta_przez_skaner_prawa_pomiar_1`, `wykryta_przez_skaner_prawa_pomiar_2`, `wykryta_przez_skaner_prawa_pomiar_3`, `zatrzymanie_wozka_prawa_pomiar_1`, `zatrzymanie_wozka_prawa_pomiar_2`, `zatrzymanie_wozka_prawa_pomiar_3`, `droga_hamowania_prawa_pomiar_1`, `droga_hamowania_prawa_pomiar_2`, `droga_hamowania_prawa_pomiar_3`) VALUES
(48, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 0000, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roboty_test_b`
--

CREATE TABLE `roboty_test_b` (
  `id` int(11) NOT NULL,
  `data` text NOT NULL,
  `miejsce_badania` text NOT NULL,
  `uczestnicy_badania` text NOT NULL,
  `numer_vin_1` text NOT NULL,
  `numer_vin_2` text NOT NULL,
  `skaner_1` text NOT NULL,
  `skaner_1_nr_seryjny` text NOT NULL,
  `skaner_2` text NOT NULL,
  `skaner_2_nr_seryjny` text NOT NULL,
  `numer_rysunku` text NOT NULL,
  `numer_schematu_elektrycznego` text NOT NULL,
  `rok_produkcji` year(4) NOT NULL,
  `maksymalna_predkosc` text NOT NULL,
  `maksymalne_obciazenie` text NOT NULL,
  `maksymalne_dopuszczalne_obciazenie` text NOT NULL,
  `podloze` text NOT NULL,
  `pola_detekcji` text NOT NULL,
  `inne` text NOT NULL,
  `probka_testowa` text NOT NULL,
  `wymiary_probki` text NOT NULL,
  `umiejscowienie_probki` text NOT NULL,
  `sila_uruchamiajaca` text NOT NULL,
  `uzyte_przyrzady` text NOT NULL,
  `sposob_wykonania_testu` text NOT NULL,
  `uwagi_1` text NOT NULL,
  `skaner_1_2_lewa` text NOT NULL,
  `predkosc_wozka_lewa` text NOT NULL,
  `obciazenie_wozka_lewa` text NOT NULL,
  `nachylenie_powierzchni_lewa` text NOT NULL,
  `wykryta_przez_skaner_lewa_pomiar_1` text NOT NULL,
  `wykryta_przez_skaner_lewa_pomiar_2` text NOT NULL,
  `wykryta_przez_skaner_lewa_pomiar_3` text NOT NULL,
  `zatrzymanie_wozka_lewa_pomiar_1` text NOT NULL,
  `zatrzymanie_wozka_lewa_pomiar_2` text NOT NULL,
  `zatrzymanie_wozka_lewa_pomiar_3` text NOT NULL,
  `droga_hamowania_lewa_pomiar_1` text NOT NULL,
  `droga_hamowania_lewa_pomiar_2` text NOT NULL,
  `droga_hamowania_lewa_pomiar_3` text NOT NULL,
  `skaner_1_skaner_2_srodek` text NOT NULL,
  `predkosc_wozka_srodek` text NOT NULL,
  `obciazenie_wozka_srodek` text NOT NULL,
  `nachylenie_powierzchni_srodek` text NOT NULL,
  `wykryta_przez_skaner_srodek_pomiar_1` text NOT NULL,
  `wykryta_przez_skaner_srodek_pomiar_2` text NOT NULL,
  `wykryta_przez_skaner_srodek_pomiar_3` text NOT NULL,
  `zatrzymanie_wozka_srodek_pomiar_1` text NOT NULL,
  `zatrzymanie_wozka_srodek_pomiar_2` text NOT NULL,
  `zatrzymanie_wozka_srodek_pomiar_3` text NOT NULL,
  `droga_hamowania_srodek_pomiar_1` text NOT NULL,
  `droga_hamowania_srodek_pomiar_2` text NOT NULL,
  `droga_hamowania_srodek_pomiar_3` text NOT NULL,
  `skaner_1_skaner_2_prawa` text NOT NULL,
  `predkosc_wozka_prawa` text NOT NULL,
  `obciazenie_wozka_prawa` text NOT NULL,
  `nachylenie_powierzchni_prawa` text NOT NULL,
  `wykryta_przez_skaner_prawa_pomiar_1` text NOT NULL,
  `wykryta_przez_skaner_prawa_pomiar_2` text NOT NULL,
  `wykryta_przez_skaner_prawa_pomiar_3` text NOT NULL,
  `zatrzymanie_wozka_prawa_pomiar_1` text NOT NULL,
  `zatrzymanie_wozka_prawa_pomiar_2` text NOT NULL,
  `zatrzymanie_wozka_prawa_pomiar_3` text NOT NULL,
  `droga_hamowania_prawa_pomiar_1` text NOT NULL,
  `droga_hamowania_prawa_pomiar_2` text NOT NULL,
  `droga_hamowania_prawa_pomiar_3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `roboty_test_b`
--

INSERT INTO `roboty_test_b` (`id`, `data`, `miejsce_badania`, `uczestnicy_badania`, `numer_vin_1`, `numer_vin_2`, `skaner_1`, `skaner_1_nr_seryjny`, `skaner_2`, `skaner_2_nr_seryjny`, `numer_rysunku`, `numer_schematu_elektrycznego`, `rok_produkcji`, `maksymalna_predkosc`, `maksymalne_obciazenie`, `maksymalne_dopuszczalne_obciazenie`, `podloze`, `pola_detekcji`, `inne`, `probka_testowa`, `wymiary_probki`, `umiejscowienie_probki`, `sila_uruchamiajaca`, `uzyte_przyrzady`, `sposob_wykonania_testu`, `uwagi_1`, `skaner_1_2_lewa`, `predkosc_wozka_lewa`, `obciazenie_wozka_lewa`, `nachylenie_powierzchni_lewa`, `wykryta_przez_skaner_lewa_pomiar_1`, `wykryta_przez_skaner_lewa_pomiar_2`, `wykryta_przez_skaner_lewa_pomiar_3`, `zatrzymanie_wozka_lewa_pomiar_1`, `zatrzymanie_wozka_lewa_pomiar_2`, `zatrzymanie_wozka_lewa_pomiar_3`, `droga_hamowania_lewa_pomiar_1`, `droga_hamowania_lewa_pomiar_2`, `droga_hamowania_lewa_pomiar_3`, `skaner_1_skaner_2_srodek`, `predkosc_wozka_srodek`, `obciazenie_wozka_srodek`, `nachylenie_powierzchni_srodek`, `wykryta_przez_skaner_srodek_pomiar_1`, `wykryta_przez_skaner_srodek_pomiar_2`, `wykryta_przez_skaner_srodek_pomiar_3`, `zatrzymanie_wozka_srodek_pomiar_1`, `zatrzymanie_wozka_srodek_pomiar_2`, `zatrzymanie_wozka_srodek_pomiar_3`, `droga_hamowania_srodek_pomiar_1`, `droga_hamowania_srodek_pomiar_2`, `droga_hamowania_srodek_pomiar_3`, `skaner_1_skaner_2_prawa`, `predkosc_wozka_prawa`, `obciazenie_wozka_prawa`, `nachylenie_powierzchni_prawa`, `wykryta_przez_skaner_prawa_pomiar_1`, `wykryta_przez_skaner_prawa_pomiar_2`, `wykryta_przez_skaner_prawa_pomiar_3`, `zatrzymanie_wozka_prawa_pomiar_1`, `zatrzymanie_wozka_prawa_pomiar_2`, `zatrzymanie_wozka_prawa_pomiar_3`, `droga_hamowania_prawa_pomiar_1`, `droga_hamowania_prawa_pomiar_2`, `droga_hamowania_prawa_pomiar_3`) VALUES
(48, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 0000, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '--', '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `roboty_uwagi`
--

CREATE TABLE `roboty_uwagi` (
  `id` int(255) NOT NULL,
  `uwaga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `roboty_uwagi`
--

INSERT INTO `roboty_uwagi` (`id`, `uwaga`) VALUES
(15, ''),
(48, '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `roboty`
--
ALTER TABLE `roboty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`);

--
-- Indeksy dla tabeli `roboty_elektronika`
--
ALTER TABLE `roboty_elektronika`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeksy dla tabeli `roboty_formularz`
--
ALTER TABLE `roboty_formularz`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `roboty_mechanika`
--
ALTER TABLE `roboty_mechanika`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `roboty_oprogramowanie`
--
ALTER TABLE `roboty_oprogramowanie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `roboty_test_a`
--
ALTER TABLE `roboty_test_a`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeksy dla tabeli `roboty_test_b`
--
ALTER TABLE `roboty_test_b`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeksy dla tabeli `roboty_uwagi`
--
ALTER TABLE `roboty_uwagi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `roboty`
--
ALTER TABLE `roboty`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT dla tabeli `roboty_elektronika`
--
ALTER TABLE `roboty_elektronika`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT dla tabeli `roboty_formularz`
--
ALTER TABLE `roboty_formularz`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT dla tabeli `roboty_mechanika`
--
ALTER TABLE `roboty_mechanika`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT dla tabeli `roboty_oprogramowanie`
--
ALTER TABLE `roboty_oprogramowanie`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT dla tabeli `roboty_uwagi`
--
ALTER TABLE `roboty_uwagi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `roboty_elektronika`
--
ALTER TABLE `roboty_elektronika`
  ADD CONSTRAINT `roboty_elektronika_ibfk_1` FOREIGN KEY (`id`) REFERENCES `roboty` (`id`);

--
-- Ograniczenia dla tabeli `roboty_formularz`
--
ALTER TABLE `roboty_formularz`
  ADD CONSTRAINT `roboty_formularz_ibfk_1` FOREIGN KEY (`id`) REFERENCES `roboty` (`id`);

--
-- Ograniczenia dla tabeli `roboty_mechanika`
--
ALTER TABLE `roboty_mechanika`
  ADD CONSTRAINT `roboty_mechanika_ibfk_1` FOREIGN KEY (`id`) REFERENCES `roboty` (`id`);

--
-- Ograniczenia dla tabeli `roboty_oprogramowanie`
--
ALTER TABLE `roboty_oprogramowanie`
  ADD CONSTRAINT `roboty_oprogramowanie_ibfk_1` FOREIGN KEY (`id`) REFERENCES `roboty` (`id`);

--
-- Ograniczenia dla tabeli `roboty_test_a`
--
ALTER TABLE `roboty_test_a`
  ADD CONSTRAINT `roboty_test_a_ibfk_1` FOREIGN KEY (`id`) REFERENCES `roboty` (`id`);

--
-- Ograniczenia dla tabeli `roboty_test_b`
--
ALTER TABLE `roboty_test_b`
  ADD CONSTRAINT `roboty_test_b_ibfk_1` FOREIGN KEY (`id`) REFERENCES `roboty` (`id`);

--
-- Ograniczenia dla tabeli `roboty_uwagi`
--
ALTER TABLE `roboty_uwagi`
  ADD CONSTRAINT `roboty_uwagi_ibfk_1` FOREIGN KEY (`id`) REFERENCES `roboty` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
