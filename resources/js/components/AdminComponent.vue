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
                    <td>
                        <div class="p-3 mb-2 bg-warning text-dark rounded">
                            {{ message.status }}
                        </div>
                        <template v-if="message.status=='Новая'">
                        <button @click.prevent="changeStatus(message.id)" type="button" class="btn btn-primary">
                            Сменить на "в работе"</button>
                        </template>
                    </td>
                    <td>
                        {{ message.coment }}
                        <div v-if="visible">
                            <button @click.prevent="addComent(message.id)" type="button"
                                class="btn btn-primary">Редактировать
                                ответ</button>
                        </div>
                        <template v-if="textarea_id===message.id && visible===false">
                            <textarea class="form-control" v-model="coment" rows="3"></textarea>
                            <button @click.prevent="pushComent(message.id)" type="button"
                                class="btn btn-primary">Отправить</button>
                        </template>
                    </td>
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
            coment: '',
            user_id: this.id,
            visible: true,
            textarea_id: null,
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
        },

        pushComent(id) {
            this.visible=true,
            axios.patch(`api/coment/${id}`, {
                coment: this.coment,
            })
                .then(response => { this.getMessage() })
        },

        addComent(id) {
            this.visible = false,
            this.textarea_id=id
        },
    },

    mounted() {
        this.getMessage()
    },
}
</script>
