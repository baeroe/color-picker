import axios from "axios";

class ApiService {
    constructor() {
        this.client = axios.create( 
            {
                baseURL: 'https://127.0.0.1:8000/api/'
            }
        )
    }

    postColor(red, green, blue, name) {
        var payload = {
            red: red,
            green: green,
            blue: blue,
            name: name
        }
        return this.client.post('color', payload)
    }

    getColors() {          
        return this.client.get('color')
    }

    deleteColor(id) {
        return this.client.delete(`color/${id}`,)
    }
}

const useApiService = () => {
    return new ApiService()
}

export default useApiService