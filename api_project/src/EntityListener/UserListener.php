<?php

namespace App\EntityListener;

use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserListener
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    /**
     * A la creation de l'user ca encode le password
     * @param User $user
     * @return void
     */
    public function prePersist(User $user): void
    {

        $this->encodePassword($user);
    }

    /**
     * Au updated du l'user ca encode le password si nouveau et met a jour le updatedAt en bdd
     * @param User $user
     * @return void
     */
    public function preUpdate(User $user): void
    {
            $this->encodePassword($user);
            $user->setUpdatedAt(new \DateTimeImmutable());
    }

    /**
     * Encode password on plain password.
     */
    public function encodePassword(User $user): void
    {
        if (null === $user->getPlainPassword()) {
            return;
        }
        $user->setPassword(
            $this->hasher->hashPassword($user, $user->getPlainPassword())
        );
    }
}
