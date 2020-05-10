Bootstrap

Instalar o tema com pip:

sudo pip install mkdocs-bootstrap

After the theme is installed, edit your mkdocs.yml file and set the theme name to bootstrap:

theme:
    name: bootstrap

== Bootswatch

sudo pip install mkdocs-bootswatch

Números de linha não ficam legal

Editar o mkdocs.yml e setar para um dos seguintes temas:

    amelia
    cerulean
    cosmo
    cyborg
    flatly
    journal
    readable
    simplex
    slate
    spacelab
    united
    yeti

For example:

theme: amelia
Or:

theme: yeti

In addition, you can request an inverted navigation header:

extra:
    theme_inverse: true

Detalhes
https://mkdocs.github.io/mkdocs-bootswatch/


== Material dark theme

Este foi o tema que melhor mostrou os números de linhas

sudo pip install mkdocs-material

theme:
  name: 'material'

If you cloned Material from GitHub:

theme:
  name: null
  custom_dir: 'mkdocs-material/material'

Detalhes
https://squidfunk.github.io/mkdocs-material/getting-started/


== mkdocs-cinder

sudo pip install mkdocs-cinder

Números de linha não ficam legal

site_name: [YOURPROJECT]
theme: cinder
nav:
- Home: index.md

Detalhes
https://sourcefoundry.org/cinder/


mkdocs-cluster theme

sudo pip install mkdocs-cluster

theme: cluster

Detalhes
https://pythonhosted.org/mkdocs-cluster/


Outros temas?
https://sphinx-themes.org/

