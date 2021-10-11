<template>
     <div class="card">
        <div class="card-header">
            Your link:
            <span class="float-right">Created at: {{ link.created_at }}</span>
        </div>

        <div class="card-body">
            <p>ID: {{ link.id }}</p>
            <p>Slug: {{ link.slug }}</p>
            <p>Destination: {{ link.destination }}</p>
            <p>Times: {{ link.times }}</p>
            <p>User ID: {{ link.user_id }}</p>
        </div>
    </div>
</template>

<script>
import useLinks from '../../composables/links'
import { onMounted } from 'vue';

export default {
    setup() {
        const { link, getLink } = useLinks()

        onMounted(getLink)

        return {
            link
        }
    }

}
</script>