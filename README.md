Projekt strony ATC-Cargo
=======

### Rejestracja
Tylko Szef może wysłać "zaproszenie" dla pracownika aby ten mógł się zarejestrować na stronie. Aby zaprosić nowego pracownika do rejestracji na stronie należy wykonać następujące kroki

1. W zakładce `Dodaj Pracownika` wypełniamy pola:
  * Stanowisko
  * Email
2. Pracownik odbiera na swoim emailu specjalny klucz rejestracyjny.
3. Pracownik weryfikuje swój klucz pod adresem `http://atc-cargo.com/register/verifictaion` aby system pomyślnie zweryfikował klucz musimy też wpisać email na który otrzymaliśmy klucz.
  * Gdy kod jest poprawny użytkownik może zacząć rejestrację konta pod adresem `htttp://atc-cargo.com/register`
  * Gdy kod jest nie poprawny, system wyświetli komunikat z błędem.

### System rang
System rang jest stworzony po to aby wygodnie zarządzać transportami i pracownikami.
* Szef
* V-CE Szef
* Dyspozytor
* Kierowca
* Okres testowy

### Zakładki
###### Karta kierowcy:
Wyświetlane są tutaj w tabeli, ostatnie transporty użytkownika(zatwierdzone) wraz z ich opisem, czyli: Data wysłania, identyfikator transportu, towar, miasto startowe, miasto docelowe oraz w szczegółach: dystans i ciężar.
###### Twoje transporty:
Znajduje się tu lista wszystkich transportów użytkownika(zatwierdzonych), wraz ze szczegółami.
###### Lista kierowców:
Wyświetlana jest lista wszystkich pracowników wraz z ich statystykami. Jeżeli pracownik nie ma żadnego aktywnego transportu to nie wyświetli się na liście. Jest również przycisk "Pokaż transporty" dzięki któremu wyświetlą się wszystkie transporty danego pracownika.
###### Statystyki kierowców:
Jest to kopia zakładki "Lista kierowców", tylko tutaj dodatkowo do statystyk jest dodana kolumna "Zarobione pieniądze", nie ma tu również przycisku który służy do pokazania wszystkich transportów danego użytkownika.
###### Dodaj pracownika:
Znajduje się tu formularz w którym musimy wpisać adres email, oraz wybrać stanowisko z listy. Wysyła on na podany adres email zaproszenie. 
Zaproszenie umozliwia rejestrację na stronie.
###### Przeglądaj pracowników:
Wyświetlani są tu wszyscy pracownicy, przy każdym z nich są przyciski odpowiadające za czynność na danym użytkowniku np. Pokazanie wszystkich transportów, Zmiana stanowiska i Zwolnienie pracownika
###### Przeglądaj transporty:
Jest tutaj lista zgłoszonych(nieaktywnych) transportów przez pracowników. Dyspozytor, Vice szef lub Szef może je zatwierdzić lub odrzucić.

### Uprawnienia
Każde stanowisko może wykonywać różne czynności dzięki którym zarządzanie firmą staje się o wiele prostrze.

| Zakładka                  | Ranga                         |
| ------------------------- | ----------------------------- |
| Przeglądaj transporty     | Szef, V-CE Szef, Dyspozytor   |
| Przeglądaj pracowników    | Szef                          |
| Dodaj pracownika          | Szef                          |

| Akcja                     | Stanowisko                    |
| ------------------------- | ----------------------------- |
| Aktywowanie transportu    | Szef, V-CE Szef, Dyspozytor   |
| Dezaktywowanie transportu | Szef                          |
| Usuwanie transportu       | Szef                          |
| Zmiana stanowiska         | Szef                          |
| Zwolnienie pracownika     | Szef                          |

###### Uwaga!
Dyspozytor i Vice szef może również usunąć transport, ale jest to możliwe tylko wtedy gdy osoba odrzuca transport z zakładki "Przeglądaj transporty".
