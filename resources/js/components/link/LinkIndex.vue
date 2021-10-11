<template>
     <div class="card">
        <div class="card-header">
            Your links
            <span class="float-right">Total : </span>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Slug</th>
                        <th>Destination</th>
                        <th>Times</th>
                        <th>User ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <template v-for="item in links" :key="item.id">
                        <tr>
                            <td>{{ item.id }}</td>
                            <td>{{ item.slug }}</td>
                            <td>{{ item.destination }}</td>
                            <td>{{ item.times }}</td>
                            <td>{{ item.user_id }}</td>
                            <td>
                                <router-link :to="{ name: 'links.show', params: { slug: item.slug } }" class="mr-2">Show</router-link>                                
                            </td>
                        </tr>
                    </template>
                </tbody>                        
            </table>
        </div>
    </div>
</template>

<script>
import useLinks from '../../composables/links'
import { onMounted } from 'vue';

export default {
    setup() {
        const { links, getLinks } = useLinks()

        onMounted(getLinks)

        return {
            links,
        }
    }
}
</script>