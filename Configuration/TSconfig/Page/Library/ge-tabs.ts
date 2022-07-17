#---------------------------------------------------------------
# PageTS ge-tabs (gridelements) for ext cp_base
#
# Generated 01.07.2017 by www.conpassione.ch
#---------------------------------------------------------------

tx_gridelements.setup {
  ge-tabcontainer {
    title = TabContainer
    description = Umfassender Container für die Darstellung von Tabs
    config {
      colCount = 1
      rowCount = 1
      rows {
        1 {
          columns {
            1 {
              name = Tab-Container
              colPos = 21
              allowed = gridelements_pi1
              allowedGridTypes = ge-tabcontent
            }
          }
        }
      }
    }
    icon = EXT:cp_base/Resources/Public/Extensions/gridelements/Icons/tab-container.gif
    frame = tabcontainer
  }
  ge-tabcontent {
    title = Tab
    description = Die Tabs, innerhalb eines Tab-Containers, fügen Sie in diesen Container ihre Inhalte ein
    config {
      colCount = 1
      rowCount = 1
      rows {
        1 {
          columns {
            1 {
              name = Tab
              colPos = 22
            }
          }
        }
      }
    }
    icon = EXT:cp_base/Resources/Public/Extensions/gridelements/Icons/tab-content.gif
    frame = tabs
  }
}