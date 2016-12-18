package mondial;

public interface CountryRepository {
    Country findCountryByCode(String code);
    Country [] findCountriesLike(String name);
}
