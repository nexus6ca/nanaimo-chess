<template>
    <div class="container-fluid no-padding">
        <header>
            <nav id='backend-nav' class="header row navbar navbar-expand-lg navbar-dark" role="navigation">
                <div class="collapse navbar-collapse" id="navbar">
                    <div class="nav navbar-nav justify-content-center">
                        <a class="nav-item active nav-link" href="/">Return to Site</a>
                        <a class="nav-item nav-link active" @click="selectPage('site')" data-toggle="modal"
                           data-target="#exampleModal">Manage Site
                        </a>
                        <a class="nav-item nav-link" @click="selectPage('pages')" data-toggle="modal"
                           data-target="#exampleModal">Manage Pages
                        </a>
                        <a class="nav-item nav-link" @click="selectPage('tournaments')" data-toggle="modal"
                           data-target="#exampleModal">Manage Tournaments
                        </a>
                        <a class="nav-item nav-link" @click="selectPage('users')" data-toggle="modal"
                           data-target="#exampleModal">Manage Users
                        </a>
                    </div>
                    <div class="nav navbar-nav ml-auto">
                        <a class="nav-item nav-link" href="/profile/display"><span
                                class="glyphicon glyphicon-user"></span> Profile</a>
                        <a class="nav-item nav-link" href="/logout"><span class="glyphicon glyphicon-log-in"></span>
                            Logout</a>
                    </div>
                </div>
            </nav>
        </header>
        <div class="row">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <div v-if="responseReady == false" class="loader">Loading...</div>
                <div v-if="page == 'site'">
                    <site-options v-if="responseReady" :csrf='csrf' :response="json"></site-options>
                </div>
                <div v-if="page == 'pages'">
                    <pages v-if="responseReady" :csrf='csrf' :response="json"></pages>
                </div>
                <div v-if="page == 'tournaments'">
                    <pages v-if="responseReady" :csrf='csrf' :response="json"></pages>
                </div>
                <div v-if="page == 'users'">
                    <pages v-if="responseReady" :csrf='csrf' :response="json"></pages>
                </div>
            </div>
            <div class="col-lg-3"></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "display-site-page",
        props: ['csrf'],
        data() {
            return {
                showDiv: false,
                json: null,
                responseReady: false,
                div: '',
                page: 'site',
                show2ndDiv: false,
            }
        },
        mounted() {
            this.selectPage(this.page);
        },
        methods: {
            selectPage(page) {
                if (this.showDiv != page) {
                    this.showDiv = true;
                    this.page = page;
                    this.getPageJson(page, this);
                }
            },
            showPage() {
                return this.div;
            },
            getPageJson(page, self) {
                axios.get('/backend/ajax/' + page).then(function (response) {
                    self.json = response.data;
                    self.responseReady = true;
                });
            }
        }
    }
</script>

<style>
    #site-control {
        padding-top: 10px;
    }

    .show-result {
        padding-top: 5px;
    }

    .loader {
        color: #33150c;
        font-size: 90px;
        text-indent: -9999em;
        overflow: hidden;
        width: 1em;
        height: 1em;
        border-radius: 50%;
        margin: 72px auto;
        position: relative;
        -webkit-transform: translateZ(0);
        -ms-transform: translateZ(0);
        transform: translateZ(0);
        -webkit-animation: load6 1.7s infinite ease, round 1.7s infinite ease;
        animation: load6 1.7s infinite ease, round 1.7s infinite ease;
    }

    @-webkit-keyframes load6 {
        0% {
            box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
        }
        5%,
        95% {
            box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
        }
        10%,
        59% {
            box-shadow: 0 -0.83em 0 -0.4em, -0.087em -0.825em 0 -0.42em, -0.173em -0.812em 0 -0.44em, -0.256em -0.789em 0 -0.46em, -0.297em -0.775em 0 -0.477em;
        }
        20% {
            box-shadow: 0 -0.83em 0 -0.4em, -0.338em -0.758em 0 -0.42em, -0.555em -0.617em 0 -0.44em, -0.671em -0.488em 0 -0.46em, -0.749em -0.34em 0 -0.477em;
        }
        38% {
            box-shadow: 0 -0.83em 0 -0.4em, -0.377em -0.74em 0 -0.42em, -0.645em -0.522em 0 -0.44em, -0.775em -0.297em 0 -0.46em, -0.82em -0.09em 0 -0.477em;
        }
        100% {
            box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
        }
    }

    @keyframes load6 {
        0% {
            box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
        }
        5%,
        95% {
            box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
        }
        10%,
        59% {
            box-shadow: 0 -0.83em 0 -0.4em, -0.087em -0.825em 0 -0.42em, -0.173em -0.812em 0 -0.44em, -0.256em -0.789em 0 -0.46em, -0.297em -0.775em 0 -0.477em;
        }
        20% {
            box-shadow: 0 -0.83em 0 -0.4em, -0.338em -0.758em 0 -0.42em, -0.555em -0.617em 0 -0.44em, -0.671em -0.488em 0 -0.46em, -0.749em -0.34em 0 -0.477em;
        }
        38% {
            box-shadow: 0 -0.83em 0 -0.4em, -0.377em -0.74em 0 -0.42em, -0.645em -0.522em 0 -0.44em, -0.775em -0.297em 0 -0.46em, -0.82em -0.09em 0 -0.477em;
        }
        100% {
            box-shadow: 0 -0.83em 0 -0.4em, 0 -0.83em 0 -0.42em, 0 -0.83em 0 -0.44em, 0 -0.83em 0 -0.46em, 0 -0.83em 0 -0.477em;
        }
    }

    @-webkit-keyframes round {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes round {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

</style>
