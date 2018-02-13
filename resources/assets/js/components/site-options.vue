<template>
    <div class="card show-result">
        <div class="card-block">
            <h4 class="card-title">Site Settings</h4>
            <form class="form-horizontal card-text" role="form" method="POST" action="/backend/site_settings">
                <div v-html="csrf"></div>
                <div class="form-group-lg">
                    <label for="site-name">Site Title</label>
                    <input id="site-name" class="form-control" name="site-title" :value="(response != 'undefined' ? response.SITE_TITLE : '')">
                </div>
                <div class="form-group-lg">
                    <label for="google-tag">Google Analytics Tag</label>
                    <input id="google-tag" class="form-control" name="google-tag" :value="(response != 'undefined' ? response.GOOGLE_ANALYTICS_KEY : '')">
                </div>
                <div class="form-group-lg">
                    <label for="tiny-mce-key">Tiny MCE Key</label>
                    <input id="tiny-mce-key" class="form-control" name="tiny-mce-key" :value="(response != 'undefined' ? response.TINY_MCE_KEY : '')">
                </div>
                <button type="submit">Submit Changes</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: "site-options",
        props: ['response', 'csrf']
    }
</script>

<style scoped>

</style>