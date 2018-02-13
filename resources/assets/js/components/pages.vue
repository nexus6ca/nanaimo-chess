<template>
    <div>
        <div class="container-fluid section-white">
            <h4 class="row section-heading">Manage Pages</h4>
            <div class="row">
                <button name="add-page" class="btn btn-primary page-button" @click="addPage">Add Page</button>
                <button name="edit-page" class="btn btn-primary" @click="editPage">Modify Page</button>
             </div>
            <hr>
        </div>
        <div class="container-fluid section-grey" v-show="showCards" @click="showCards = !showCards">
            <div class="row" v-show="responseReady">
                <h4 class="no-margin row section-heading">Pages</h4>
                <div class="row">
                    <div class="card-deck col-lg-12">
                        <div v-for="option in json" class="col-sm-4">
                            <div class="card">
                                <div class="card-block">
                                    <h4 class="card-title section-heading">{{option.title}}</h4>
                                    <p class="card-text" v-html="option.entry"></p>
                                    <button class="btn btn-primary" @click="openForm(option.id)">Edit</button>
                                    <button class="btn btn-danger" @click="openForm(option.id)">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid section-grey">
            <div class="row" v-show="revealForm" v-html="buildIframe()"></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "pages",
        data() {
            return {
                revealForm: false,
                showCards: false,
                page: 'add-form',
                source: '/backend/page/add',
                json: null,
                responseReady: false,
                selected: 1
            }
        },
        mounted() {
            this.getPageJson('pages', this);
        },
        methods: {
            addPage() {
                console.log('add');
                this.page = 'add-form';
                this.showCards = false;
                this.revealForm = true;
            },
            editPage() {
                this.page = 'edit-form';
                this.showCards = true;
                this.getPageJson('pages', this);
            },
            deletePage() {
                debuuger;
                this.page = 'delete-form';
                this.showCards = true;
                this.getPageJson('pages', this);
            },
            openForm(id) {
                this.selected = id;
                this.revealForm = true;
            },
            buildIframe() {
                console.log(this.page);
                if (this.page == 'add-form') {
                    return '<iframe id="form-frame" style="height: 1000px" frameborder="0" width="100%" marginheight="0" marginwidth="0" scrolling="no" src="/backend/page/add"></iframe>'
                } else if (this.page == 'edit-form') {
                    return '<iframe id="form-frame" style="height: 1000px" frameborder="0" width="100%" marginheight="0" marginwidth="0" scrolling="no" src="/backend/page/edit/' + this.selected + '"></iframe>'
                } else if (this.page == 'delete-form') {
                    return '<iframe id="form-frame" style="height: 1000px" frameborder="0" width="100%" marginheight="0" marginwidth="0" scrolling="no" src="/backend/page/delete/' + this.selected + '"></iframe>'
                }
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

<style scoped>
    h4 {
        width: 100%;
    }

    .page-button {
        margin-right: 5px;
    }
</style>