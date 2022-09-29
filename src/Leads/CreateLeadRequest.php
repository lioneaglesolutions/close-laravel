<?php

namespace Lioneagle\Close\Leads;

class CreateLeadRequest
{
    public function __construct(
        public readonly string  $name,
        public readonly ?string $status = null
    ) {}
}