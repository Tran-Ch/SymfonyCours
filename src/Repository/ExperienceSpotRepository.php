<?php

namespace App\Repository;

use App\Entity\ExperienceSpot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExperienceSpot>
 *
 * @method ExperienceSpot|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExperienceSpot|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExperienceSpot[]    findAll()
 * @method ExperienceSpot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExperienceSpotRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExperienceSpot::class);
    }

    /**
     * Lấy các spot theo region + category
     * Ví dụ: ('nord', 'incroyable') cho trang EXPÉRIENCE INCROYABLE DU NORD
     *
     * @return ExperienceSpot[]
     */
    public function findByRegionAndCategory(string $region, string $category): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.region = :region')
            ->andWhere('s.category = :category')
            ->setParameter('region', $region)
            ->setParameter('category', $category)
            ->orderBy('s.id', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
