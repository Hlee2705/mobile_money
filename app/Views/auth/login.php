<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>TanaPay — Connexion</title>

    <link rel="stylesheet" href="<?= base_url('template/design-system.css') ?>">

</head>


<body>


    <div class="app-shell">


        <div style="
width:100%;
min-height:100vh;
display:flex;
align-items:center;
justify-content:center;
background:var(--color-bg-page);
">


            <div class="card" style="
width:420px;
">


                <div class="card__header" style="text-align:center;">


                    <div class="sidebar__brand-mark"
                        style="
margin:auto;
width:60px;
height:60px;
font-size:22px;
">

                        TP

                    </div>


                    <h2 style="margin-top:20px;">
                        Bienvenue sur TanaPay
                    </h2>


                    <p class="text-muted text-sm">
                        Connectez-vous avec votre numéro de téléphone
                    </p>


                </div>



                <div class="card__body">


                    <?php if (session()->getFlashdata('error')): ?>

                        <div class="alert alert--danger">

                            <div>
                                <?= session()->getFlashdata('error') ?>
                            </div>

                        </div>

                    <?php endif; ?>



                    <form method="post" action="<?= base_url('/login') ?>">


                        <div class="form-group">

                            <label class="form-label">
                                Numéro téléphone
                            </label>


                            <div class="input-affix">

                                <span class="affix">
                                    +261
                                </span>


                                <input
                                    class="form-control"
                                    type="text"
                                    name="numero"
                                    value="<?= old('numero') ?>"
                                    placeholder="0330000000">


                            </div>


                            <div class="form-hint">
                                Exemple : 0330000000 ou 0371234567
                            </div>


                        </div>



                        <button
                            class="btn btn--primary"
                            style="width:100%;">

                            Se connecter

                        </button>



                    </form>


                </div>


                <div class="card__footer text-center">

                    <span class="text-xs text-muted">
                        TanaPay — Mobile Money
                    </span>

                </div>


            </div>


        </div>


    </div>


</body>

</html>