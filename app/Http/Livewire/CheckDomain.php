<?php

namespace App\Http\Livewire;

use App\Http\Requests\DomainRequest;
use App\Rules\FQDN;
use Livewire\Component;
use Larva\Whois\Whois;

class CheckDomain extends Component
{
    public $domain;
    public $domains;

    protected function rules() {
        return (new DomainRequest)->rules();
    }

    public function show() {
        $data = explode(PHP_EOL, $this->validate()['domain']);
        foreach ($data as $datum) {
            $info = Whois::lookupInfo($datum);
            $this->domains[$datum] = $info ? date("Y/m/d H:i:s", $info->expirationDate): 'Domain is free.';
        }
    }

    public function render()
    {
        return view('livewire.check-domain');
    }

}
