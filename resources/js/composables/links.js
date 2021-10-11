import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useLinks() {
	const link = ref([])
	const links = ref([])

	const router = useRouter()

	const getLinks = async () => {
		let response = await axios.get('/api/links/')
		links.value = response.data.data
	}

	const getLink = async () => {
        let response = await axios.get('/api/links/dfkfoer')
        link.value = response.data.data
    }

    return {
    	getLinks,
    	getLink,
    	links,
    	link
    }
}