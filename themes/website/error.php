<?php $v->layout("_theme"); ?>
<?php $v->start("styles"); ?>
<!-- Google font -->
<link href="https://fonts.googleapis.com/css?family=Cabin:400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">

<style>

    #notfound {
        position: relative;
        height: 32vh;
        min-height: 530px;
    }

    #notfound .notfound {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }

    .notfound {
        max-width: 520px;
        width: 100%;
        line-height: 1.4;
        text-align: center;
    }

    .notfound .notfound-404 {
        position: relative;
        height: 240px;
    }

    .notfound .notfound-404 h1 {
        font-family: 'Montserrat', sans-serif;
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        font-size: 252px;
        font-weight: 900;
        margin: 0px;
        color: #262626;
        text-transform: uppercase;
        letter-spacing: -40px;
        margin-left: -20px;
    }

    .notfound .notfound-404 h1 > span {
        text-shadow: -8px 0px 0px #fff;
    }

    .notfound .notfound-404 h3 {
        font-family: 'Cabin', sans-serif;
        position: relative;
        font-size: 16px;
        font-weight: 700;
        text-transform: uppercase;
        color: #262626;
        margin: 0px;
        letter-spacing: 3px;
        padding-left: 6px;
    }

    .notfound h2 {
        font-family: 'Cabin', sans-serif;
        font-size: 20px;
        font-weight: 400;
        text-transform: uppercase;
        color: #000;
        margin-top: 0px;
        margin-bottom: 25px;
    }

    @media only screen and (max-width: 767px) {
        .notfound .notfound-404 {
            height: 200px;
        }

        .notfound .notfound-404 h1 {
            font-size: 200px;
        }
    }

    @media only screen and (max-width: 480px) {
        .notfound .notfound-404 {
            height: 162px;
        }

        .notfound .notfound-404 h1 {
            font-size: 162px;
            height: 150px;
            line-height: 162px;
        }

        .notfound h2 {
            font-size: 16px;
        }
    }
</style>

<?php $v->end(); ?>


<main>
    <div id="notfound">
        <div class="notfound">

            <div class="notfound-404">
                <h3>404 error, page or file not found</h3>
                <h1>
                    <span>4</span><span>0</span><span>4</span>
                </h1>
            </div><!-- .notfound-404 -->

            <h2>we are sorry, but the page you requested was not found</h2>

        </div><!-- .notfound -->
    </div><!-- #notfound -->
</main>

