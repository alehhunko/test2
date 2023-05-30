<template>
    <div class="container">
        <div class="row justify-content-center text-uppercase">
            Новая заявка
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Земельные споры</th>
                    <th scope="col">Семейные споры</th>
                    <th scope="col">Трудовые споры</th>
                    <th scope="col">Споры с ГИБДД</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row justify-content-center text-uppercase">
            Заявки Клиентов
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Клиент</th>
                    <th scope="col">Земельные споры</th>
                    <th scope="col">Семейные споры</th>
                    <th scope="col">Трудовые споры</th>
                    <th scope="col">Споры с ГИБДД</th>
                </tr>
            </thead>
            <tbody>
                    <tr v-for="message in messages">
                        <th scope="row" v-for="client in clients" v-if="client.id===message.user_id">{{ client.name }}</th>
                        <td>{{ message.content_eath }}</td>
                        <td>{{ message.content_family }}</td>
                        <td>{{ message.content_work }}</td>
                        <td>{{ message.content_policy }}</td>
                    </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            clients: null,
            messages: null
        }
    },

    methods: {
        getMessage() {
            axios.get('api/client')
                .then(response => { this.messages = response.data[0] })
        },

        getClient() {
            axios.get('api/client')
                .then(response => { this.clients = response.data[1] })
        },
    },

    mounted() {
        this.getMessage()
        this.getClient()
    },
}
</script>
