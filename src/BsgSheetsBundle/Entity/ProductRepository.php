<?php

namespace BsgSheetsBundle\Entity;

//use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * ProductRepository
 */
class ProductRepository extends EntityRepository
{
    /**
     * @param $productId
     * @return mixed|null
     */
    public function getOneProductById($productId)
    {
        $q = $this->createQueryBuilder('p')
            ->where('p.id = :id')
            ->setParameter('id', $productId)
            ->getQuery();
        try {
            return $q->getSingleResult();
        } catch (NoResultException $e) {
            return null;
        }
    }

//    /**
//     * Fetch a single domain by domain name and TLD name
//     *
//     * @param string $domainName
//     * @param string $tldName
//     * @throws NoResultException If the query result is not unique.
//     * @return Domain|null
//     */
//    public function fetchOneByDomainAndTld($domainName, $tldName)
//    {
//        $q = $this->createQueryBuilder('d')
//            ->join('d.tld', 't')
//            ->where('d.name = :domain')
//            ->andWhere('t.name = :tld')
//            ->setParameter('domain', $domainName)
//            ->setParameter('tld', $tldName)
//            ->getQuery();
//
//        try {
//            return $q->getSingleResult();
//        } catch (NoResultException $e) {
//            return null;
//        }
//    }
//
//    /**
//     * Get all domains a user has on their alert list
//     *
//     * @param User $user
//     * @return array
//     */
//    public function findDomainsOnUsersAlertList(User $user)
//    {
//        return $this->createQueryBuilder('d')
//            ->innerJoin('d.alerts', 'u')
//            ->where('u = :user')
//            ->setParameter('user', $user)
//            ->getQuery()
//            ->getResult();
//    }
//
//    /**
//     * Fetch or create a single domain by domain name and TLD name
//     *
//     * @param string $domainName
//     * @param string $tldName
//     * @throws NonUniqueResultException If the query result is not unique.
//     * @return Domain
//     */
//    public function fetchOrCreateOneByDomainAndTld($domainName, $tldName)
//    {
//        $domain = $this->fetchOneByDomainAndTld($domainName, $tldName);
//
//        if (!$domain instanceof Domain) {
//            $tldRepository = $this->getEntityManager()->getRepository('MijndomeinGTLDTldBundle:Tld');
//            $tld = $tldRepository->fetchOneByName($tldName);
//
//            $domain = new Domain($domainName, $tld);
//        }
//
//        return $domain;
//    }
}
