package ch.hfict.esta.core.repository;

import ch.hfict.esta.core.domain.Student;

import javax.persistence.EntityManager;
import javax.persistence.EntityTransaction;

public class StudentJpaRepository implements StudentRepository {

    EntityManager entityManager;

    public EntityManager getEntityManager() {
        return entityManager;
    }

    public void setEntityManager(EntityManager em) {
        this.entityManager = em;
    }

    @Override
    public Student save(Student student) {
        EntityTransaction transaction = entityManager.getTransaction();
        transaction.begin();
        entityManager.persist(student);
        transaction.commit();
        return student;
    }
}
