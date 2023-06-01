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
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="form-group">
                            <textarea class="form-control" v-model="content_eath" rows="3"></textarea>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <textarea class="form-control" v-model="content_family" rows="3"></textarea>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <textarea class="form-control" v-model="content_work" rows="3"></textarea>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <textarea class="form-control" v-model="content_policy" rows="3"></textarea>
                        </div>
                    </td>
                    <td>
                        <div v-if="user_id > 0" class="d-flex align-items-center">
                            <button @click.prevent="addClient" type="button" class="btn btn-primary"
                                style="margin-top: 15%;">Отправить</button>
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
                    <th scope="col">Имя клиента</th>
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
                    <td>
                        <div class="p-3 mb-2 bg-warning text-dark rounded">
                            {{ message.status }}
                        </div>
                        <template v-if="message.status !== 'Завершено'">
                            <div v-if="message.coment !== null">
                                <button @click.prevent="changeStatus(message.id)" type="button"
                                    class="btn btn-primary">Сменить на "Завершено"</button>
                            </div>
                        </template>
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

        addClient() {
            axios
                .post('api/new', {
                    content_eath: this.content_eath,
                    content_family: this.content_family,
                    content_work: this.content_work,
                    content_policy: this.content_policy,
                    user_id: this.user_id,
                    status: this.status,
                })
                .then(res => { this.getMessage() })
        },

        changeStatus(id) {
            axios.patch(`api/client/${id}`)
                .then(response => { this.getMessage() })
        }
    },

    mounted() {
        this.getMessage()
    },
}
</script>
