<?php

namespace GCF\MainBundle\Repository;

/**
 * EventRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EventRepository extends \Doctrine\ORM\EntityRepository
{
    public function findlast($nb){

        $nosEvent = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('e')
            ->from('GCFMainBundle:Event', 'e')
            //->where('p.categorie = 1')
            ->setMaxResults($nb)
            ->orderBy('e.id', 'DESC')
            ->getQuery()
            ->getResult();

        return $nosEvent;
    }
    
    public function search($keyword, $nb = 50){
        $nosEvent = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('e')
            ->from('GCFMainBundle:Event', 'e')
            ->where('e.nom LIKE :key')
            ->orWhere('e.description LIKE :key')
            ->setParameter('key' , '%'.$keyword.'%')
            ->setMaxResults($nb)
            ->orderBy('e.id', 'DESC')
            ->getQuery()
            ->getResult();
        return $nosEvent;
    }

    //    marwen
    public function findEvent( ){

        $nosEvent = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('e')
            ->from('GCFMainBundle:Event', 'e')
            ->getQuery()
            ->getArrayResult();// a ne pas supprimer array result (utiliser dans le calendrier)

        return $nosEvent;
    }

    public function findByName( $name ){

        $Event = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('e')
            ->from('GCFMainBundle:Event', 'e')
            ->where('e.nom LIKE :name')
            ->setParameter('name', '%'.$name.'%')
            ->orderBy('e.id', 'DESC')
            ->getQuery()
            ->getResult()
            ->getSingleResult();

        return $Event;
    }

}
