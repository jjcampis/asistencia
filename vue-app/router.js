const Login = {
    template: `
    <div class="container mt-5">
        <h3>Ingreso</h3>
        <form @submit.prevent="doLogin">
            <div class="form-group">
                <input v-model="usr" class="form-control" placeholder="Usuario" required>
            </div>
            <div class="form-group">
                <input v-model="pass" type="password" class="form-control" placeholder="Contraseña" required>
            </div>
            <button class="btn btn-primary" type="submit">Ingresar</button>
        </form>
    </div>
    `,
    data(){
        return {usr:'', pass:''};
    },
    methods:{
        doLogin(){
            this.$store.dispatch('login', {usr:this.usr, pass:this.pass})
                .then(()=>{
                    this.$router.push('/home');
                })
                .catch(()=> alert('Credenciales inválidas'));
        }
    }
};

const Home = {
    computed:{
        cursos(){ return this.$store.state.cursos; }
    },
    template:`
    <div class="container mt-4">
        <h3>Cursos y Alumnos</h3>
        <ul v-if="cursos.length">
            <li v-for="al in cursos" :key="al.id">
                {{al.curso}} - {{al.alumno}} ({{al.dni}})
            </li>
        </ul>
        <p v-else>No hay datos</p>
    </div>
    `
};

const router = new VueRouter({
    routes:[
        {path:'/', redirect:'/login'},
        {path:'/login', component: Login},
        {path:'/home', component: Home}
    ]
});
