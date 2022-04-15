<?php

require_once 'lib/Json.php';
require_once 'models/UserModel.php';

class UsersJson extends Json
{
    private string $filePrefix = 'users';

    /**
     * @param UserModel $userInfo
     * @return void
     */
    public function update(UserModel $userInfo): void
    {
        try {
            $user = [
                'username' => $userInfo->getUsername(),
                'phone' => $userInfo->getPhone(),
                'email' => $userInfo->getEmail(),
                'password' => $userInfo->getPassword()
            ];
            $currentData = $this->read($this->filePrefix);
            $currentData[] = $user;
            $this->write($this->filePrefix, $currentData);
        } catch (JsonException $e) {
        }
    }
}