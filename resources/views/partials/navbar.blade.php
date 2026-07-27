<nav class="top-navbar">

    <div class="navbar-left">

        <h2>

            Tableau de bord

        </h2>

        <p>

            Bienvenue sur la plateforme Smart Incubator

        </p>

    </div>

    <div class="navbar-right">

        <div class="user-box">

            <div class="user-avatar">

                {{ strtoupper(substr(session('user_name'),0,1)) }}

            </div>

            <div>

                <h6>
    {{ session('user_name') }}
</h6>

<small>
    @if(session('user_role') == 'etudiant')
        Étudiant
    @elseif(session('user_role') == 'incubateur')
        Responsable Incubateur
    @elseif(session('user_role') == 'cati')
        Responsable CATI
    @endif
</small>
            </div>

        </div>

    </div>

</nav>