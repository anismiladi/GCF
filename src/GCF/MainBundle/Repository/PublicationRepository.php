<?php

namespace GCF\MainBundle\Repository;

/**
 * PublicationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PublicationRepository extends \Doctrine\ORM\EntityRepository
{
    public function findlast2_Nospublication(){

        $nosPub = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('p')
            ->from('GCFMainBundle:Publication', 'p')
            ->where('p.categorie = 1' )
            ->andWhere('p.etatPub = 2')
            ->setMaxResults(2)
            ->orderBy('p.id', 'DESC')
            ->getQuery()
            ->getResult();

        return $nosPub;
    }
    public function findLastGbPublication(){

        $nosPub = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('p')
            ->from('GCFMainBundle:Publication', 'p')
            ->where('p.categorie = 2' )
            ->andWhere('p.etatPub = 2')
            ->setMaxResults(1)
            ->orderBy('p.id', 'DESC')
            ->getQuery()
            ->getResult();

        return $nosPub;
    }
    public function findLastAutresPublication(){

        $nosPub = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('p')
            ->from('GCFMainBundle:Publication', 'p')
            ->where('p.categorie = 3' )
            ->andWhere('p.etatPub = 2')
            ->setMaxResults(1)
            ->orderBy('p.id', 'DESC')
            ->getQuery()
            ->getResult();

        return $nosPub;
    }
    
    public function search($keyword, $nb = 50){
        $nosPub = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('e')
            ->from('GCFMainBundle:Publication', 'e')
            ->where('e.titre LIKE :key')
            ->orWhere('e.contenu LIKE :key')
            
            ->setParameter('key' , '%'.$keyword.'%')
            ->setMaxResults($nb)
            ->orderBy('e.id', 'DESC')
            ->getQuery()
            ->getResult();
        return $nosPub;
    }

    public function findRelatedPublications(){

        $relatedPublications = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('p')
            ->from('GCFMainBundle:Publication', 'p')
            ->where('p.etatPub = 2')
            ->setMaxResults(3)
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();

        return $relatedPublications;
    }
}
