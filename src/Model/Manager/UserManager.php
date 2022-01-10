<?php

namespace Elogeek\AdministrationPage\Model\Manager;

use Elogeek\AdministrationPage\Model\DB;
use Elogeek\AdministrationPage\Model\Entity\User;

class UserManager {

    /**
     * Return an User by his id
     * @param int $id
     * @return User|null
     */
    public function getById(int $id): ?User {
        $user = null;
        $request = DB::getInstance()->prepare("SELECT * FROM user WHERE id = :id");
        $request->bindValue(':id', $id);
        $result = $request->execute();

        if ($result) {
            $user_data = $request->fetch();
            if ($user_data) {
                $role = $user_data['role_fk'];
                $user = new User($user_data['id'],$user_data['name'], $user_data['lastname'], $user_data['password'], $user_data['mail']);
            }
        }
        return $user;
    }

    /**
     * Return a user based on provided email if any.
     * @param string $mail
     * @return User|null
     */
    public function getByMail(string $mail): ?User {
        $user = null;
        $request = DB::getInstance()->prepare("SELECT * FROM user WHERE mail = :mail");
        $request->bindValue(':mail', $mail);
        if($request->execute()) {
            $data = $request->fetch();
            if($request->rowCount() > 0) {
                $user = new User($data['id'], $data['name'], $data['lastname'], $data['mail']);
            }
        }
        return $user;
    }

    /**
     * Return an User by his user name or null
     * @param string $mail
     * @return bool
     */
    public function existUser(string $mail): bool {
        $request = DB::getInstance()->prepare("SELECT count(*) as cnt FROM user WHERE mail = :mail");
        $request->bindValue(':mail', $mail);
        $request->execute();
        return intval($request->fetch()['cnt']) > 0;
    }


    /**
     * Add an user into table user
     * @param User $user
     * @return bool
     */
    public function add(User $user): bool {
        $request = DB::getInstance()->prepare("INSERT INTO user (name, lastname, mail, password) VALUES (:name, :lastname, :mail, :password)");

        $request->bindValue(":name", $user->getName());
        $request->bindValue(":lastname", $user->getLastname());
        $request->bindValue(":mail", $user->getMail());
        $request->bindValue(":password", password_hash($user->getPassword(), PASSWORD_BCRYPT));

        return $request->execute() && DB::encodePassword($request) && DB::getInstance()->lastInsertId() != 0;
    }

    /**
     * Update an user into the database
     * @param User $user
     * @return bool
     */
    public function updateUser(User $user): bool {
        $request = DB::getInstance()->prepare("UPDATE user SET name = :name, lastname = :lastname, mail = :mail WHERE id = :id");
        $request->bindValue(":name", $user->getName());
        $request->bindValue(":lastname", $user->getLastname());
        $request->bindValue(";mail", $user->getMail());

        return $request->execute();
    }

    /**
     * Modify password user and encode new password in the BDD
     * @param User $user
     * @param string $plainPassword
     * @return bool
     */
    public function updatePassword(User $user, string $plainPassword): bool {
        $request = DB::getInstance()->prepare(" UPDATE user SET password = :password WHERE id = :id");
        $request->bindValue(':id', $user->getId());
        $request->bindValue(':password', DB::encodePassword($plainPassword));
        $request->execute();

        return $plainPassword;
    }

    /**
     * Delete an user into the database
     * @param User $user
     * @return bool
     */
    public function delete(User $user): bool {
        $request = DB::getInstance()->prepare("DELETE FROM user WHERE id = :id");
        $request->bindValue(':id', $user->getId());

        return $request->execute();
    }

}