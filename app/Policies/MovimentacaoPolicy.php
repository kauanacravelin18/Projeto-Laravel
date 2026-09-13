<?php

namespace App\Policies;

use App\Models\Movimentacao;
use App\Models\User;

class MovimentacaoPolicy
{
    /**
     * Qualquer usuário autenticado pode visualizar movimentações.
     */
    public function viewAny(User $user): bool
    {
        return in_array($user->role, [
            'admin',
            'gerente',
            'usuario',
        ], true);
    }

    /**
     * Apenas administrador e gerente podem registrar movimentações.
     */
    public function create(User $user): bool
    {
        return in_array($user->role, [
            'admin',
            'gerente',
        ], true);
    }

    /**
     * Somente administrador pode excluir movimentações.
     */
    public function delete(User $user, Movimentacao $movimentacao): bool
    {
        return $user->role === 'admin';
    }
}