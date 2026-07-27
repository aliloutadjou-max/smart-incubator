<div class="sidebar">

    @php
        $role = session('user_role');
    @endphp

    <div class="sidebar-header">

        <img src="{{ asset('images/logo.png') }}" class="sidebar-logo">

        <h4>Smart Incubator</h4>

        <p>Université de Tissemsilt</p>

    </div>

    <div class="sidebar-menu">

        {{-- ===================== ETUDIANT ===================== --}}

        @if($role=='etudiant')

            <a href="{{ route('dashboard.etudiant') }}"
               class="{{ request()->routeIs('dashboard.etudiant') ? 'active' : '' }}">

                <i class="bi bi-grid-1x2-fill"></i>

                <span>Dashboard</span>

            </a>

            <a href="{{ route('projet.index') }}"
               class="{{ request()->routeIs('projet.index') ? 'active' : '' }}">

                <i class="bi bi-folder-fill"></i>

                <span>Mes projets</span>

            </a>

            <a href="{{ route('projet.create') }}"
               class="{{ request()->routeIs('projet.create') ? 'active' : '' }}">

                <i class="bi bi-plus-circle-fill"></i>

                <span>Nouveau projet</span>

            </a>

            <a href="{{ route('demandes.index') }}"
               class="{{ request()->routeIs('demandes.index') ? 'active' : '' }}">

                <i class="bi bi-send-check-fill"></i>

                <span>Mes demandes</span>

            </a>

            <a href="{{ route('profil') }}"
               class="{{ request()->routeIs('profil') ? 'active' : '' }}">

                <i class="bi bi-person-fill"></i>

                <span>Mon profil</span>

            </a>

        @endif


        {{-- ===================== INCUBATEUR ===================== --}}

        @if($role=='incubateur')

            <a href="{{ route('dashboard.incubateur') }}"
               class="{{ request()->routeIs('dashboard.incubateur') ? 'active' : '' }}">

                <i class="bi bi-grid-1x2-fill"></i>

                <span>Dashboard</span>

            </a>

            <a href="{{ route('incubateur.demandes',['statut'=>'En attente']) }}">

                <i class="bi bi-inboxes-fill"></i>

                <span>Demandes reçues</span>

            </a>

            <a href="{{ route('incubateur.demandes') }}"
               class="{{ request()->routeIs('incubateur.demandes') ? 'active' : '' }}">

                <i class="bi bi-list-check"></i>

                <span>Toutes les demandes</span>

            </a>

        @endif


        {{-- ===================== CATI ===================== --}}

        @if($role=='cati')

            <a href="{{ route('dashboard.cati') }}"
               class="{{ request()->routeIs('dashboard.cati') ? 'active' : '' }}">

                <i class="bi bi-grid-1x2-fill"></i>

                <span>Dashboard</span>

            </a>

            <a href="{{ route('cati.dossiers') }}"
               class="{{ request()->routeIs('cati.dossiers') ? 'active' : '' }}">

                <i class="bi bi-folder-check"></i>

                <span>Dossiers reçus</span>

            </a>

            <a href="{{ route('cati.avis.index') }}"
               class="{{ request()->routeIs('cati.avis.index') ? 'active' : '' }}">

                <i class="bi bi-file-earmark-text"></i>

                <span>Avis techniques</span>

            </a>

        @endif

    </div>

    <div class="sidebar-footer">

        <a href="{{ route('logout') }}">

            <i class="bi bi-box-arrow-right"></i>

            Déconnexion

        </a>

    </div>

</div>