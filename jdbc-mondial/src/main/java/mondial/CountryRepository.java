package mondial;

public interface CountryRepository {
    Country [] findCountriesLike(String name);
}