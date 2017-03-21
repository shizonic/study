package ch.hfict.esta.core;

import javax.persistence.EntityManagerFactory;
import javax.persistence.Persistence;

import ch.hfict.esta.core.repository.StudentJpaRepository;
import ch.hfict.esta.core.domain.Student;

/**
 * Hello world!
 *
 */
public class App 
{
    public static void main( String[] args )
    {
        EntityManagerFactory emf = Persistence.createEntityManagerFactory("ch.hfict.esta");
        StudentJpaRepository studentRepository = new StudentJpaRepository();
        studentRepository.setEntityManager(emf.createEntityManager());

        Student student = new Student();
        student.setFirstname("Hans");
        student.setLastname("Muster");

        student = studentRepository.save(student);

        System.out.println( "Student " + student.getId() + " saved.");
    }
}
