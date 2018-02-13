<template>
    <div id="page-chooser">
        <v-select v-model="selected" :options="options" label="title" filterable="false" @search="onSearch">
            <template slot="no-options">
                Enter Page ID
            </template>
            <template slot="option" slot-scope="option">
                {{ option.title }}
            </template>
            <template slot="selected-option" slot-scope="option">
                <div class="selected d-center">
                    {{ option.title }}
                </div>
            </template>
        </v-select>

        <div v-cloak v-if="pageSeleted">
            <form class="form-horizontal card-text" role="form" method="POST"
                  :action="formAction">
                {{ csrf }}
                <div class="form-group-lg row">
                    <div class="col-lg-6">
                        <label for="page-name">Page Name</label>
                        <input id="page-name" class="form-control" name="page-name" :value="page.title">
                    </div>
                    <div class="col-lg-6">
                        <label for="page-category">Page Category</label>
                        <select id="page-category" class="form-control" name="page-category"
                                :value="page.category">
                            <option value="news">News</option>
                            <option value="upcoming">Upcoming Tournaments</option>
                            <option value="next">Next Tournament</option>
                            <option value="last">Last Tournament</option>
                            <option value="club">Clubs</option>
                        </select>
                    </div>
                </div>
                <div class="form-group-lg">
                    <label for="page-content">Page Content</label>
                    <textarea id="page-content" class="form-control" name="page-content">{{ page.entry }}</textarea>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "page-chooser",
        props: ['csfr'],
        data() {
            return {
                options: [],
                responseReady: false,
                pageResponseReady: false,
                page: null,
                selected: ''
            }
        },
          methods: {
            onSearch(search, loading){
                loading(true);
                this.search(loading, search, this);
            },
            search (loading, page, self) {
                axios.get('/backend/ajax/pages').then(function (response) {
                    self.options = response.data;
                    console.log(self.options);
                    loading(false);
                });
            },
            // getSinglePage(selected, self) {
            //     axios.get('/backend/ajax/page/' + selected).then(function (response) {
            //         self.page = response.data;
            //         self.pageResponseReady = true;
            //     });
            // },
            // formAction() {
            //     return '/backend/edit-page/' + this.selected;
            // }
        }
    }
</script>

<style scoped>

</style>