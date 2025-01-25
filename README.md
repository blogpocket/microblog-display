# Microblog display
Oculta los posts con la etiqueta "microblog" del listado principal de WordPress.
## ¿Cómo funciona este código?
- Hook pre_get_posts: Este hook nos permite modificar la consulta de WordPress antes de que se ejecute para mostrar los posts.
## Condicionales
- ! is_admin() garantiza que no apliquemos este filtro en el panel de administración.
- $query->is_main_query() comprueba que sea la consulta principal de WordPress (no una secundaria).
- $query->is_home() asegura que solo afecte a la página principal del blog o a los archivos (por ejemplo, paginaciones de blog).
## Exclusión de la etiqueta
- Usamos get_term_by() para recuperar el término de la etiqueta microblog.
- Si la etiqueta existe, con tag__not_in le indicamos a la consulta que no incluya posts de esa etiqueta.
Con esto, los posts que tengan la etiqueta "microblog" ya no se mostrarán en tu listado principal (o en tus archivos de blog). Así, quedarán totalmente "ocultos" a nivel de frontend sin necesidad de editar plantillas.
