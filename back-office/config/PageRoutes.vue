<script>

    const routes = [
        { path: '/', component: () => import(/* webpackChunkName: "global" */'../src/components/HelloWorld.vue') },
    ]

    export default routes;
</script>
