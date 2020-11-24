<?php

namespace App\Response;

class JsonResponse
{
    /**
     * @var mixed|null
     */
    protected $data;

    /**
     * @var string|null
     */
    protected $message;

    public function setData($data): self
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param mixed $message
     *
     * @return JsonResponse
     */
    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
}