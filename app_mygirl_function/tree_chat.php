<script type="text/javascript" src="<?php echo $url;?>/js/go.js"></script>
<?php
$id_view='';
$lang_view='vi';
$type_chat='chat';

$txt_json='';

if(isset($_GET['id'])){ $id_view=$_GET['id'];}
if(isset($_GET['lang'])){ $lang_view=$_GET['lang'];}
if(isset($_GET['type_chat'])){ $type_chat=$_GET['type_chat'];}

if($id_view==''){
    $query_chat=mysqli_query($link,"SELECT `id` FROM `app_my_girl_$lang_view` WHERE `id_redirect` = '' AND `pater` = '' AND `effect` != '2' AND `effect` != '36' ORDER BY RAND() LIMIT 1");
    $data_chat=mysqli_fetch_assoc($query_chat);
    $id_view=$data_chat['id'];
}
?>


<script type="text/javascript">
    var cur_id_view='<?php echo $id_view;?>';
    var cur_type_view='<?php echo $type_chat;?>';
    var cur_lang_view='<?php echo $lang_view;?>';

    var myDiagram=null;
    
    function show_web_mini(url_mini){
                swal({
                        title: "Thao tác nhanh",
                        text: "<iframe style='width:100%;height:500px;' src='"+url_mini+"'></iframe>",
                        html: true,
                        showCancelButton: true,
                        cancelButtonClass: "btn-info",
                        confirmButtonText: "Hoàn tất - cập nhật cây",
                        cancelButtonText: "đóng",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            load_cur_tree();
                        }
                    });
    }

   function init() {
      if (window.goSamples) goSamples();  
      var $ = go.GraphObject.make;  // for conciseness in defining templates

      myDiagram =
        $(go.Diagram, "myDiagramDiv", // must be the ID or reference to div
          {
            maxSelectionCount: 1, // users can select only one part at a time
            validCycle: go.Diagram.CycleDestinationTree, // make sure users can only create trees
            "clickCreatingTool.archetypeNodeData": { // allow double-click in background to create a new node
              name: "(new person)",
              title: "",
              comments: ""
            },
            "clickCreatingTool.insertPart": function(loc) {  // scroll to the new node
              var node = go.ClickCreatingTool.prototype.insertPart.call(this, loc);
              if (node !== null) {
                this.diagram.select(node);
                this.diagram.commandHandler.scrollToPart(node);
                this.diagram.commandHandler.editTextBlock(node.findObject("NAMETB"));
              }
              return node;
            },
            layout:
              $(go.TreeLayout,
                {
                  treeStyle: go.TreeLayout.StyleLastParents,
                  arrangement: go.TreeLayout.ArrangementHorizontal,
                  // properties for most of the tree:
                  angle: 90,
                  layerSpacing: 35,
                  // properties for the "last parents":
                  alternateAngle: 90,
                  alternateLayerSpacing: 35,
                  alternateAlignment: go.TreeLayout.AlignmentBus,
                  alternateNodeSpacing: 20
                }),
            "undoManager.isEnabled": true // enable undo & redo
          });

      // when the document is modified, add a "*" to the title and enable the "Save" button
      myDiagram.addDiagramListener("Modified", function(e) {
        var button = document.getElementById("SaveButton");
        if (button) button.disabled = !myDiagram.isModified;
        var idx = document.title.indexOf("*");
        if (myDiagram.isModified) {
          if (idx < 0) document.title += "*";
        } else {
          if (idx >= 0) document.title = document.title.substr(0, idx);
        }
      });

      // manage boss info manually when a node or link is deleted from the diagram
      myDiagram.addDiagramListener("SelectionDeleting", function(e) {
        var part = e.subject.first(); // e.subject is the myDiagram.selection collection,
        // so we'll get the first since we know we only have one selection
        myDiagram.startTransaction("clear boss");
        if (part instanceof go.Node) {
          var it = part.findTreeChildrenNodes(); // find all child nodes
          while (it.next()) { // now iterate through them and clear out the boss information
            var child = it.value;
            var bossText = child.findObject("boss"); // since the boss TextBlock is named, we can access it by name
            if (bossText === null) return;
            bossText.text = "";
          }
        } else if (part instanceof go.Link) {
          var child = part.toNode;
          var bossText = child.findObject("boss"); // since the boss TextBlock is named, we can access it by name
          if (bossText === null) return;
          bossText.text = "";
        }
        myDiagram.commitTransaction("clear boss");
      });

      var levelColors = ["#AC193D", "#2672EC", "#8C0095", "#5133AB",
        "#008299", "#D24726", "#008A00", "#094AB2"];

      // override TreeLayout.commitNodes to also modify the background brush based on the tree depth level
      myDiagram.layout.commitNodes = function() {
        go.TreeLayout.prototype.commitNodes.call(myDiagram.layout);  // do the standard behavior
        // then go through all of the vertexes and set their corresponding node's Shape.fill
        // to a brush dependent on the TreeVertex.level value
        myDiagram.layout.network.vertexes.each(function(v) {
          if (v.node) {
            var level = v.level % (levelColors.length);
            var color = levelColors[level];
            var shape = v.node.findObject("SHAPE");
            if (shape) shape.stroke = $(go.Brush, "Linear", { 0: color, 1: go.Brush.lightenBy(color, 0.05), start: go.Spot.Left, end: go.Spot.Right });
          }
        });
      };

      // when a node is double-clicked, add a child to it
      function nodeDoubleClick(e, obj) {
        var clicked = obj.part;
        if (clicked !== null) {
          var thisemp = clicked.data;
          myDiagram.startTransaction("add employee");
          var newemp = {
            name: "(new person)",
            title: "",
            comments: "",
            parent: thisemp.key
          };
          myDiagram.model.addNodeData(newemp);
          myDiagram.commitTransaction("add employee");
        }
      }

      // this is used to determine feedback during drags
      function mayWorkFor(node1, node2) {
        if (!(node1 instanceof go.Node)) return false;  // must be a Node
        if (node1 === node2) return false;  // cannot work for yourself
        if (node2.isInTreeOf(node1)) return false;  // cannot work for someone who works for you
        return true;
      }

      // This function provides a common style for most of the TextBlocks.
      // Some of these values may be overridden in a particular TextBlock.
      function textStyle() {
        return { font: "9pt  Segoe UI,sans-serif", stroke: "white" };
      }

      function textStyle2() {
        return { font: "20pt  Segoe UI,sans-serif", stroke: "yellow" };
      }

      // This converter is used by the Picture.
      function findHeadShot(id) {
   
        //return "images/HS" + id + ".jpg"
      }

      // define the Node template
      myDiagram.nodeTemplate =
        $(go.Node, "Auto",
          { doubleClick: nodeDoubleClick },
          { // handle dragging a Node onto a Node to (maybe) change the reporting relationship
            mouseDragEnter: function(e, node, prev) {
              var diagram = node.diagram;
              var selnode = diagram.selection.first();
              if (!mayWorkFor(selnode, node)) return;
              var shape = node.findObject("SHAPE");
              if (shape) {
                shape._prevFill = shape.fill;  // remember the original brush
                shape.fill = "darkred";
              }
            },
            mouseDragLeave: function(e, node, next) {
              var shape = node.findObject("SHAPE");
              if (shape && shape._prevFill) {
                shape.fill = shape._prevFill;  // restore the original brush
              }
            },
            mouseDrop: function(e, node) {
              var diagram = node.diagram;
              var selnode = diagram.selection.first();  // assume just one Node in selection
              if (mayWorkFor(selnode, node)) {
                // find any existing link into the selected node
                var link = selnode.findTreeParentLink();
                if (link !== null) {  // reconnect any existing link
                  link.fromNode = node;
                } else {  // else create a new link
                  diagram.toolManager.linkingTool.insertLink(node, node.port, selnode, selnode.port);
                }
              }
            }
          },
          // for sorting, have the Node.text be the data.name
          new go.Binding("text", "name"),
          // bind the Part.layerName to control the Node's layer depending on whether it isSelected
          new go.Binding("layerName", "isSelected", function(sel) { return sel ? "Foreground" : ""; }).ofObject(),
          // define the node's outer shape
          $(go.Shape, "Rectangle",
            {
              name: "SHAPE", fill: "#333333", stroke: 'white', strokeWidth: 3.5,
              // set the port properties:
              portId: "", fromLinkable: true, toLinkable: true, cursor: "pointer"
            }),
          $(go.Panel, "Horizontal",
            //$(go.Picture,
              //{
               // name: "Picture",
                //desiredSize: new go.Size(70, 70),
                //margin: 1.5,
             // },
              //new go.Binding("source", "key", findHeadShot)),
            // define the panel where the text will appear
            $(go.Panel, "Table",
              {
                minSize: new go.Size(130, NaN),
                maxSize: new go.Size(150, NaN),
                margin: new go.Margin(6, 10, 0, 6),
                defaultAlignment: go.Spot.Left
              },
              $(go.RowColumnDefinition, { column: 2, width: 4 }),
              $(go.TextBlock, textStyle2(),  // the name
                {
                  row: 0, column: 0, columnSpan: 5,
                  font: "12pt Segoe UI,sans-serif",
                  editable: true, isMultiline: false,
                  minSize: new go.Size(10, 16)
                },
                new go.Binding("text", "name").makeTwoWay()),
              $(go.TextBlock, "❤️️", textStyle(),
                { row: 1, column: 0 }),
              $(go.TextBlock, textStyle(),
                {
                  row: 1, column: 1, columnSpan: 4,
                  editable: true, isMultiline: false,
                  minSize: new go.Size(20, 14),
                  margin: new go.Margin(0, 0, 0, 6)
                },
                new go.Binding("text", "title").makeTwoWay()),
              $(go.TextBlock, textStyle(),  // the comments
                {
                  row: 3, column: 0, columnSpan: 5,
                  font: " 9pt sans-serif",
                  wrap: go.TextBlock.WrapFit,
                  editable: false, 
                  minSize: new go.Size(10, 14),stroke:"#72b9eb"
                },
                new go.Binding("text", "comments").makeTwoWay())
            )  // end Table Panel
          ) // end Horizontal Panel
        );  // end Node


      myDiagram.nodeTemplate.contextMenu =
        $("ContextMenu",
          $("ContextMenuButton",
            $(go.TextBlock, "✚ Thêm trò chuyện ở mục này"),
            {
              click: function(e, obj) {
                var node = obj.part.adornedPart;
                if (node !== null) {
                    var thisemp = node.data;
                    window.open('<?php echo $url;?>/app_my_girl_add.php?id_question='+thisemp.id+'&lang=<?php echo $lang_view;?>&sex='+thisemp.sex+'&character_sex='+thisemp.character_sex+'&type_question='+thisemp.type, '_blank');
                }
              }
            }
          ),
          $("ContextMenuButton",
            $(go.TextBlock, "✚ Thêm nhanh trò chuyện ở mục này"),
            {
              click: function(e, obj) {
                var node = obj.part.adornedPart;
                if (node !== null) {
                    var thisemp = node.data;
                    show_web_mini('<?php echo $url;?>/app_my_girl_add.php?id_question='+thisemp.id+'&lang=<?php echo $lang_view;?>&sex='+thisemp.sex+'&character_sex='+thisemp.character_sex+'&type_question='+thisemp.type, '_blank');
                }
              }
            }
          ),
          $("ContextMenuButton",
            $(go.TextBlock, "✎ Cập nhật"),
            {
              click: function(e, obj) {
                var node = obj.part.adornedPart;
                if (node !== null) {
                    var thisemp = node.data;
                    if(thisemp.type=='chat'){
                        window.open('<?php echo $url;?>/app_my_girl_update.php?id='+thisemp.id+'&lang=<?php echo $lang_view;?>', '_blank');
                    }else{
                        window.open('<?php echo $url;?>/app_my_girl_update.php?id='+thisemp.id+'&lang=<?php echo $lang_view;?>&msg=1', '_blank');
                    }
                }
              }
            }
          ),
          $("ContextMenuButton",
            $(go.TextBlock, "✍ Cập nhật nhanh"),
            {
              click: function(e, obj) {
                var node = obj.part.adornedPart;
                if (node !== null) {
                    var thisemp = node.data;
                    if(thisemp.type=='chat'){
                        show_web_mini('<?php echo $url;?>/app_my_girl_update.php?id='+thisemp.id+'&lang=<?php echo $lang_view;?>');
                    }else{
                        show_web_mini('<?php echo $url;?>/app_my_girl_update.php?id='+thisemp.id+'&lang=<?php echo $lang_view;?>&msg=1');
                    }
                }
              }
            }
          ),
          $("ContextMenuButton",
            $(go.TextBlock, "📌 Chi tiết - (Trở thành nhánh chính)"),
            {
              click: function(e, obj) {
                var node = obj.part.adornedPart;
                if (node !== null) {
                    var thisemp = node.data;
                    cur_id_view=thisemp.id;
                    cur_type_view=thisemp.type;
                    load_cur_tree();
                }
              }
            }
          ),
          $("ContextMenuButton",
            $(go.TextBlock, "⌚ Theo dõi trả lời"),
            {
              click: function(e, obj) {
                var node = obj.part.adornedPart;
                if (node !== null) {
                    var thisemp = node.data;
                    show_web_mini('<?php echo $url;?>/app_my_girl_history.php?lang=<?php echo $lang_view;?>&id_chat_see='+thisemp.id+'&type_chat_see='+thisemp.type+'&sex='+thisemp.sex+'&character_sex='+thisemp.character_sex);
                }
              }
            }
          ),
          $("ContextMenuButton",
            $(go.TextBlock, "✘ Xóa"),
            {
              click: function(e, obj) {
                var node = obj.part.adornedPart;
                if (node !== null) {
                    var thisemp = node.data;
                    if(thisemp.type=='chat'){
                        show_web_mini('<?php echo $url;?>/app_my_girl_handling.php?func=delete_chat&id='+thisemp.id+'&lang=<?php echo $lang_view;?>');
                    }else{
                        swal('Không thể xóa câu thoại!');
                    }
                }
              }
            }
          )
        );

      // define the Link template
      myDiagram.linkTemplate =
        $(go.Link, go.Link.Orthogonal,
          { corner: 5, relinkableFrom: true, relinkableTo: true },
          $(go.Shape, { strokeWidth: 1.5, stroke: "#F5F5F5" }));  // the link shape



      // support editing the properties of the selected person in HTML
      if (window.Inspector) myInspector = new Inspector("myInspector", myDiagram,
        {
          properties: {
            "key": { readOnly: true },
            "comments": {}
          }
        });

    } 

    function fix_pos_tree(){
        myDiagram.commandHandler.zoomToFit();
        myDiagram.scale = 1;
        myDiagram.commandHandler.scrollToPart(myDiagram.findNodeForKey(1));
    }

    // Show the diagram's model in JSON format
    function save() {
      document.getElementById("mySavedModel").value = myDiagram.model.toJson();
      myDiagram.isModified = false;
    }

    $(document).ready(function(){
        init();
        load_cur_tree();
    });
    
    function load_tree_chat(id_view,type_view,lang_view) {
        $.ajax({
            url: "app_my_girl_jquery.php",
            type: "post", 
            data: "function=load_tree_chat&id_view="+id_view+"&lang_view="+lang_view+"&type_view="+type_view,
            success: function (data, textStatus, jqXHR) {
                myDiagram.model = go.Model.fromJson('{"class": "go.TreeModel","nodeDataArray": ['+data+']}');
                var lastkey = 1;
                myDiagram.model.makeUniqueKeyFunction = function(model, data) {
                    var k = data.key || lastkey;
                    while (model.findNodeDataForKey(k)) k++;
                    data.key = lastkey = k;
                    return k;
                };
            }
        });
    }

    function load_cur_tree(){
        load_tree_chat(cur_id_view,cur_type_view,cur_lang_view);
        close_loading();
    }

    function get_chat_tree(type_chat){
        show_loading();
        $.ajax({
            url: "app_my_girl_jquery.php",
            type: "post", 
            data: "function=get_chat_tree&type_chat="+type_chat+"&lang_view=<?php echo $lang_view; ?>",
            success: function (data, textStatus, jqXHR) {
                cur_id_view=data;
                if(type_chat=='key_chat')type_chat='chat';
                if(type_chat=='key_msg')type_chat='msg';
                cur_type_view=type_chat;
                load_cur_tree();
            }
        });
    }
</script>

<div id="sample">
  <div id="myDiagramDiv" style="background-color: #34343C; border: solid 1px black; height: 80%;"></div>

  <div>
    <div id="myInspector">
    </div>
  </div>

  <div>
    <div>
      <span class="buttonPro  green" onclick="load_cur_tree();"><i class="fa fa-tree" aria-hidden="true"></i> Làm mới lại cây</span>
      <span class="buttonPro  green" onclick="fix_pos_tree();"><i class="fa fa-align-center" aria-hidden="true"></i> Vị trí ban đầu</span>
      <span class="buttonPro  blue" onclick="get_chat_tree('chat');"><i class="fa fa-comments" aria-hidden="true"></i> Lấy câu trò chuyện</span>
      <span class="buttonPro  blue" onclick="get_chat_tree('msg');"><i class="fa fa-commenting-o" aria-hidden="true"></i> Lấy câu thoại</span>
      <span class="buttonPro  blue" onclick="get_chat_tree('key_chat');"><i class="fa fa-history" aria-hidden="true"></i> Lấy trò chuyện có theo dõi</span>
      <span class="buttonPro  blue" onclick="get_chat_tree('key_msg');"><i class="fa fa-history" aria-hidden="true"></i> Lấy câu thoại có theo dõi</span>
    </div>
  </div>
</div>

