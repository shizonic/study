package mondial;

public interface CityRepository {
    City[] findCitiesByCountry(String country);
}
