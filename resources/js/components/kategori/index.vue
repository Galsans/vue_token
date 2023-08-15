<template>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4>Table Kategori</h4>
                    <router-link to="/kategori/create" class="btn btn-secondary">Add</router-link>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(kategori, index) in item" :key="kategori.index">
                                    <td>{{ index + 1 }}</td>
                                    <td>{{ kategori.nama }}</td>
                                    <td>{{ kategori.dkr }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <router-link :to="`/kategori/${kategori.id}`" class="btn btn-info">View</router-link>
                                            <router-link :to="`/kategori/${kategori.id}/edit`" class="btn btn-secondary">Edit</router-link>
                                            <button type="submit" @click="btnDelete(kategori.id)" class="btn btn-danger">Trash</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>
import axios from 'axios';
export default{
    data(){
        return{
            item: []
        }
    },
    async created(){
        const req = await axios.get("http://localhost:8000/api/kategori/");
        this.item = req.data;
    },
    methods: {
        async btnDelete(id) {
            try{
                await axios.delete(`http://localhost:8000/api/kategori/${id}`);
                this.item = this.item.filter((kategori)=> kategori.id !== id)
            }catch(err) {
                console.log(err)
            }
        }
    },
}
</script>
