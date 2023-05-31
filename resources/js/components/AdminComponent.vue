<template>
    <div class="container">
        <div class="row justify-content-center text-uppercase">
            Юрист
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Клиент</th>
                    <th scope="col">Земельные споры</th>
                    <th scope="col">Семейные споры</th>
                    <th scope="col">Трудовые споры</th>
                    <th scope="col">Споры с ГИБДД</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Ответ на заявку</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="message in messages[0]">
                    <th scope="row" v-for="client in messages[1]" v-if="client.id === message.user_id">{{ client.name }}
                    </th>
                    <td>{{ message.content_eath }}</td>
                    <td>{{ message.content_family }}</td>
                    <td>{{ message.content_work }}</td>
                    <td>{{ message.content_policy }}</td>
                    <td class="table-danger d-flex justify-content-between">
                        {{ message.status }}
                        <button @click.prevent="changeStatus(message.id)" type="button" class="btn btn-primary">
                            В работе</button>
                    </td>
                    <td>{{ message.coment }}</td>
                </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
export default {
    data() {
        return {
            messages: [],
            content_eath: '',
            content_family: '',
            content_work: '',
            content_policy: '',
            status: 'Новая',
            user_id: this.id,
        }
    },

    props: ['id'],

    methods: {
        getMessage() {
            axios.get('api/client')
                .then(response => { this.messages = response.data })
        },

        changeStatus(id) {
            axios.patch(`api/lawyer/${id}`)
                .then(response => { this.getMessage() })
        }
    },

    mounted() {
        this.getMessage()
    },
}
</script>
