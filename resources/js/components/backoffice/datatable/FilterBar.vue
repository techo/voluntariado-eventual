<template>
    <span class="filter-bar">
        <form class="form-inline">
            <div class="form-group">
                <label>Filtrar por:</label>
                <input
                        type="text"
                        v-model="filterText"
                        class="form-control input"
                        @keyup.enter="doFilter"
                        :placeholder="dataPlaceholderText"
                        style="width: 20em"
                >
                <button class="btn btn-primary" @click.prevent="doFilter">Buscar</button>
                <button class="btn btn-default" @click.prevent="resetFilter">Borrar</button>
                <button class="btn btn-default" @click.prevent="exportar">
                    <i class="glyphicon glyphicon-save-file"></i> Exportar a Excel
                </button>

            </div>
        </form>
    </span>
</template>

<script>
    export default {
        name: "FilterBar",
        props: ['placeholderText'],
        data() {
            return {
                filterText: '',
                dataPlaceholderText: this.placeholderText
            }
        },
        methods: {
            doFilter() {
                this.$events.fire('filter-set', this.filterText)
            },
            resetFilter() {
                this.filterText = '';
                this.$events.fire('filter-reset');
            },
            exportar() {
                location.href = location.href + '/exportar?filter=' + this.filterText
            }
        }
    }
</script>
<style>
    .filter-bar {
        padding: 10px;
    }

</style>
