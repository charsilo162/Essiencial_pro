<?php

namespace App\Livewire\Admin;

use App\Services\ApiService;
use Livewire\Component;

class Commissions extends Component
{
    public $rate = '';
    public $status = '';          // '' | pending | paid
    public $agentId = null;
    public $agentName = '';
    public $pageNumber = 1;

    public $flash = null;         // ['ok' => bool, 'text' => string]

    public function mount(ApiService $api)
    {
        try {
            $res = $api->get('admin/commissions');
            $this->rate = $res['rate'] ?? 500;
        } catch (\Exception $e) {
            $this->rate = 500;
        }
    }

    public function setStatus($status)
    {
        $this->status = in_array($status, ['pending', 'paid'], true) ? $status : '';
        $this->pageNumber = 1;
    }

    public function filterAgent($id, $name)
    {
        $this->agentId = $id;
        $this->agentName = $name;
        $this->pageNumber = 1;
    }

    public function clearAgent()
    {
        $this->agentId = null;
        $this->agentName = '';
        $this->pageNumber = 1;
    }

    public function saveRate(ApiService $api)
    {
        $this->resetErrorBag();
        $this->flash = null;

        if ($this->rate === '' || !is_numeric($this->rate) || $this->rate < 0) {
            $this->addError('rate', 'Enter an amount of 0 or more.');
            return;
        }

        try {
            $res = $api->post('admin/commissions/rate', ['rate' => $this->rate]);

            if (isset($res['errors']['rate'])) {
                $this->addError('rate', $res['errors']['rate'][0]);
                return;
            }

            $this->flash = [
                'ok'   => (bool) ($res['status'] ?? false),
                'text' => $res['message'] ?? 'Could not save the amount.',
            ];
        } catch (\Exception $e) {
            $this->flash = ['ok' => false, 'text' => 'Server error. Please try again later.'];
        }
    }

    public function markPaid(ApiService $api, $id)
    {
        try {
            $res = $api->post("admin/commissions/{$id}/paid");
            $this->flash = [
                'ok'   => (bool) ($res['status'] ?? false),
                'text' => $res['message'] ?? 'Could not update the commission.',
            ];
        } catch (\Exception $e) {
            $this->flash = ['ok' => false, 'text' => 'Server error. Please try again later.'];
        }
    }

    public function payAll(ApiService $api)
    {
        if (!$this->agentId) {
            return;
        }

        try {
            $res = $api->post('admin/commissions/pay-agent', ['agent_id' => $this->agentId]);
            $this->flash = [
                'ok'   => (bool) ($res['status'] ?? false),
                'text' => $res['message'] ?? 'Could not update the commissions.',
            ];
        } catch (\Exception $e) {
            $this->flash = ['ok' => false, 'text' => 'Server error. Please try again later.'];
        }
    }

    public function nextPage()
    {
        $this->pageNumber++;
    }

    public function previousPage()
    {
        if ($this->pageNumber > 1) {
            $this->pageNumber--;
        }
    }

    public function render(ApiService $api)
    {
        $rows = [];
        $totals = ['pending' => 0, 'paid' => 0, 'total' => 0, 'pending_count' => 0, 'paid_count' => 0];
        $lastPage = 1;

        try {
            $res = $api->get('admin/commissions', [
                'page'   => $this->pageNumber,
                'status' => $this->status,
                'agent'  => $this->agentId,
            ]);

            $rows     = $res['data'] ?? [];
            $totals   = $res['totals'] ?? $totals;
            $lastPage = $res['meta']['last_page'] ?? 1;
        } catch (\Exception $e) {
            // Show an empty table instead of crashing the page
        }

        return view('livewire.admin.commissions', [
            'rows'     => $rows,
            'totals'   => $totals,
            'lastPage' => $lastPage,
        ])->layout('layouts.dashboard', ['title' => 'Commissions']);
    }
}