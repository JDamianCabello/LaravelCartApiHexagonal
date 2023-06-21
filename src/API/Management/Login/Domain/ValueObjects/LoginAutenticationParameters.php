<?php

namespace Src\API\Management\Login\Domain\ValueObjects;

use Src\API\Shared\Domain\ValueObjects\MixedValueObject;

final class LoginAutenticationParameters extends MixedValueObject
{
    /**
     * @return array
     */
    public function handler(): array
    {
        return [
            'iat' => time(),
            'exp' => $this->getTime(),
            'auf' => $this->aud(),
            'data' => $this->value()
        ];
    }

    /**
     * @return float|int
     */
    private function getTime()
    {
        return time() + (60*60); // 1 hour
    }

    /**
     * @return string|null
     */
    private function aud(): ?string
    {
        $aud = '';

        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            $aud = $_SERVER['HTTP_CLIENT_IP'];
        }

        if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $aud = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }

        if(!empty($_SERVER['REMOTE_ADDR'])){
            $aud = $_SERVER['REMOTE_ADDR'];
        }

        $aud .= @$_SERVER['HTTP_USER_AGENT'];
        $aud .= gethostname();

        return sha1($aud ?? null);
    }

    /**
     * @return string
     */
    public function jwtKey(): string
    {
        return env('JWT_KEY');
    }

    /**
     * @return string
     */
    public function jwtKEncrypt(): string
    {
        return env('JWT_ENCRYPT');
    }
}
