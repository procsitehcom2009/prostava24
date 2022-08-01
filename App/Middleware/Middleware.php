<?php

namespace App\Middleware;

abstract class Middleware
{
    /**
     * @var Middleware
     */
    private $next;

    /**
     * Этот метод можно использовать для построения цепочки объектов middleware.
     */
    public function linkWith($next)
    {
        $this->next = $next;

        return $next;
    }

    public function work(array $request): bool
    {
        if (!$this->check($request)) {
            return false;
        }

        if (!empty($this->next)) {
            return $this->next->work($request);
        }

        return true;
    }

    /**
     * Подклассы должны переопределить этот метод, чтобы предоставить свои
     * собственные проверки. Подкласс может обратиться к родительской реализации
     * проверки, если сам не в состоянии обработать запрос.
     */
    abstract protected function check(array $request): bool;
}