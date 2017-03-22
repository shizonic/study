package ch.hfict.esta.core;

import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;

import ch.hfict.esta.core.repository.StudentJpaRepository;
import ch.hfict.esta.core.domain.Student;

import org.slf4j.Logger;
import org.slf4j.LoggerFactory;

/**
 * Hello world!
 *
 */
public class App 
{
    final static Logger logger = LoggerFactory.getLogger(App.class);

    public static void main( String[] args )
    {
        EntityManagerFactory emf = Persistence.createEntityManagerFactory("ch.hfict.esta");
        StudentJpaRepository studentRepository = new StudentJpaRepository();
        studentRepository.setEntityManager(emf.createEntityManager());

        logger.debug("Debug");
        logger.info("Info");
        logger.warn("Warning");
        logger.error("Error");
        logger.trace("Trace");

        Student student = new Student();
        student.setFirstname("Hans");
        student.setLastname("Muster");

        System.out.println( "ID before persist: " + student.getId());

        student = studentRepository.save(student);

        System.out.println( "Student " + student.getId() + " saved.");
    }
}
