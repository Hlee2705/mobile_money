<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TanaPay — Connexion</title>

    <link rel="stylesheet" href="<?= base_url('template/design-system.css') ?>">

</head>


<body>


<div class="login-page">


    <div class="login-card card">


        <!-- Logo + titre -->
        <div class="card__header login-header">


            <div class="login-brand">

                <div class="sidebar__brand-mark login-logo">
                    TP
                </div>


                <div>

                    <h2>
                        TanaPay
                    </h2>

                    <p class="text-sm text-muted">
                        Mobile Money sécurisé
                    </p>

                </div>

            </div>


        </div>



        <!-- Formulaire -->
        <div class="card__body">


            <div class="login-message">

                <h3>
                    Bienvenue
                </h3>

                <p class="text-muted text-sm">
                    Entrez votre numéro de téléphone pour accéder à votre compte.
                </p>

            </div>



            <?php if (session()->getFlashdata('error')): ?>

                <div class="alert alert--danger">

                    <?= session()->getFlashdata('error') ?>

                </div>

            <?php endif; ?>



            <form method="post" action="<?= base_url('/login') ?>">


                <div class="form-group">


                    <label class="form-label">
                        Numéro de téléphone
                    </label>



                    <div class="input-affix">


                        <span class="affix">
                            +261
                        </span>


                        <input
                            type="text"
                            name="numero"
                            class="form-control"
                            placeholder="0330000000"
                            value="<?= old('numero') ?>"
                            autocomplete="tel"
                            required
                        >


                    </div>



                    <div class="form-hint">

                        Exemple : 0330000000 ou 0371234567

                    </div>


                </div>



                <button 
                    type="submit"
                    class="btn btn--primary btn--block">

                    Se connecter

                </button>



            </form>


        </div>




        <!-- Footer -->

        <div class="card__footer login-footer">

            <span class="text-xs text-muted">

                TanaPay © <?= date('Y') ?>

            </span>


        </div>


    </div>



</div>


</body>

</html>