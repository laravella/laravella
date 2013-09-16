(function(a) {
    a.fn.json2html = function(f, c, b) {
        var e;
        var d = jQuery.type(f);
        switch (d) {
            case"string":
                e = jQuery.parseJSON(f);
                break;
            default:
                e = f;
                break
        }
        if (b != undefined) {
            a.extend(a.json2html.options, b)
        }
        return this.each(function() {
            if (a.json2html.options.prepend) {
                a.fn.prepend.apply(a(this), a.json2html(e, c))
            } else {
                a.fn.append.apply(a(this), a.json2html(e, c))
            }
        })
    };
    a.json2html = function(e, d) {
        var f = jQuery.type(e);
        if (d == null) {
            return(null)
        }
        var g = [];
        switch (f) {
            case"array":
                var b = e.length;
                for (var c = 0; c < b; ++c) {
                    g = g.concat(a.json2html.apply(e[c], d, c))
                }
                break;
            case"object":
                g = g.concat(a.json2html.apply(e, d));
                break
        }
        return(g)
    };
    a.json2html.options = {eventData: null, prepend: false};
    a.json2html.apply = function(d, c, b) {
        var e = [];
        i = 0;
        var g = a.json2html.applyTransform(d, c, b);
        var f = jQuery.type(g);
        switch (f) {
            case"array":
                e = e.concat(g);
                i += g.length;
                break;
            default:
                e[i] = g;
                i++;
                break
        }
        return(e)
    };
    a.json2html.applyTransform = function(f, c, h) {
        var n = [];
        var g = 0;
        var j = jQuery.type(c);
        switch (j) {
            case"array":
                var k = c.length;
                for (var o = 0; o < k; ++o) {
                    n = n.concat(a.json2html.applyTransform(f, c[o], h))
                }
                break;
            case"object":
                var q = c.tag;
                if (q != null) {
                    var e = a(document.createElement(q));
                    for (var m in c) {
                        switch (m) {
                            case"tag":
                                break;
                            case"children":
                                var b = c.children;
                                var l = jQuery.type(b);
                                switch (l) {
                                    case"function":
                                        a.fn.append.apply(a(e), b(f));
                                        break;
                                    case"array":
                                        a.fn.append.apply(a(e), a.json2html.applyTransform(f, c.children, h));
                                        break;
                                    default:
                                        break
                                }
                                break;
                            case"html":
                                a(e).html(a.json2html.getValue(f, c, "html", h));
                                break;
                            default:
                                var p = false;
                                if (m.charAt(0) === "o") {
                                    if (m.charAt(1) === "n") {
                                        var d = {action: c[m], obj: f, data: a.json2html.options.eventData, index: h};
                                        a(e).bind(m.substring(m.indexOf("on") + 2), d, function(r) {
                                            d.event = r;
                                            d.action(d)
                                        });
                                        p = true
                                    }
                                }
                                if (!p) {
                                    a(e).attr(m, a.json2html.getValue(f, c, m, h))
                                }
                                break
                            }
                    }
                    n[g] = e;
                    g++
                }
                break
        }
        return(n)
    };
    a.json2html.getValue = function(h, d, e, c) {
        var b = "";
        var j = d[e];
        var g = jQuery.type(j);
        switch (g) {
            case"function":
                return(j(h, c));
                break;
            case"string":
                var f = new a.json2html.tokenizer([/\${([^\}\{]+)}/], function(l, m, k) {
                    return m ? l.replace(k, function(s, q) {
                        var t = q.split(".");
                        var o = h;
                        var u = "";
                        var n = t.length;
                        for (var r = 0; r < n; ++r) {
                            if (t[r].length > 0) {
                                var p = o[t[r]];
                                o = p;
                                if (o == null || o == undefined) {
                                    break
                                }
                            }
                        }
                        if (o != null && o != undefined) {
                            u = o
                        }
                        return(u)
                    }) : l
                });
                b = f.parse(j).join("");
                break
        }
        return(b)
    };
    a.json2html.tokenizer = function(c, b) {
        if (!(this instanceof a.json2html.tokenizer)) {
            return new a.json2html.tokenizer(c, onEnd, onFound)
        }
        this.tokenizers = c.splice ? c : [c];
        if (b) {
            this.doBuild = b
        }
        this.parse = function(d) {
            this.src = d;
            this.ended = false;
            this.tokens = [];
            do {
                this.next()
            } while (!this.ended);
            return this.tokens
        };
        this.build = function(d, e) {
            if (d) {
                this.tokens.push(!this.doBuild ? d : this.doBuild(d, e, this.tkn))
            }
        };
        this.next = function() {
            var d = this, e;
            d.findMin();
            e = d.src.slice(0, d.min);
            d.build(e, false);
            d.src = d.src.slice(d.min).replace(d.tkn, function(f) {
                d.build(f, true);
                return""
            });
            if (!d.src) {
                d.ended = true
            }
        };
        this.findMin = function() {
            var f = this, g = 0, e, d;
            f.min = -1;
            f.tkn = "";
            while ((e = f.tokenizers[g++]) !== undefined) {
                d = f.src[e.test ? "search" : "indexOf"](e);
                if (d != -1 && (f.min == -1 || d < f.min)) {
                    f.tkn = e;
                    f.min = d
                }
            }
            if (f.min == -1) {
                f.min = f.src.length
            }
        }
    }
})(jQuery);

//three types of objects
//	array
//  object
//  function

//var json2 = {"header": {"version": "0.0.8", "status": 1, "message": ""}, "response": [{"productLine": "Classic Cars", "products": 38}, {"productLine": "Motorcycles", "products": 13}, {"productLine": "Planes", "products": 12}, {"productLine": "Ships", "products": 9}, {"productLine": "Trains", "products": 3}, {"productLine": "Trucks and Buses", "products": 11}, {"productLine": "Vintage Cars", "products": 24}]};

var transforms = {
    'object': {'tag': 'div', 'class': 'package ${show} ${type}', 'children': [
            {'tag': 'div', 'class': 'header', 'children': [
                    {'tag': 'div', 'class': function(obj) {
                            if (getValue(obj.value) !== undefined)
                                return('arrow hide');
                            else
                                return('arrow');
                        }},
                    {'tag': 'span', 'class': 'name', 'html': '${name}'},
                    {'tag': 'span', 'class': 'value', 'html': function(obj) {
                            var value = getValue(obj.value);
                            if (value !== undefined)
                                return(" : " + value);
                            else
                                return('');
                        }},
                    {'tag': 'span', 'class': 'type', 'html': '${type}'}
                ]},
            {'tag': 'div', 'class': 'children', 'children': function(obj) {
                    return(children(obj.value));
                }}
        ]}
};

$(function() {

    //$('#inputJSON').val(JSON.stringify(json2));

    //Visualize sample
    visualize(JSON.parse($('#inputJSON').val()));

/*
    $('#btnVisualize').click(function() {

        //Get the value from the input field
        var json_string = $('#inputJSON').val();

        console.log(json_string);

        //Parse the json string
        try
        {
            //json
            //var json = JSON.parse(json_string);

            //eval
            eval("var json=" + json_string);

            visualize(json);
        }
        catch (e)
        {
            alert("Sorry error in json string, please correct and try again: " + e.message);
        }
    });
*/
});

function visualize(json) {

    $('#top').html('');

    $('#top').json2html(convert('json', json, 'open'), transforms.object);

    regEvents();
}

function getValue(obj) {
    var type = $.type(obj);

    //Determine if this object has children
    switch (type) {
        case 'array':
        case 'object':
            return(undefined);
            break;

        case 'function':
            //none
            return('function');
            break;

        case 'string':
            return("'" + obj + "'");
            break;

        default:
            return(obj);
            break;
    }
}

//Transform the children
function children(obj) {
    var type = $.type(obj);

    //Determine if this object has children
    switch (type) {
        case 'array':
        case 'object':
            return($.json2html(obj, transforms.object));
            break;

        default:
            //This must be a litteral
            break;
    }
}

function convert(name, obj, show) {

    var type = $.type(obj);

    if (show === undefined)
        show = 'closed';

    var children = [];

    //Determine the type of this object
    switch (type) {
        case 'array':
            //Transform array
            //Itterrate through the array and add it to the elements array
            var len = obj.length;
            for (var j = 0; j < len; ++j) {
                //Concat the return elements from this objects tranformation
                children[j] = convert(j, obj[j]);
            }
            break;

        case 'object':
            //Transform Object
            var j = 0;
            for (var prop in obj) {
                children[j] = convert(prop, obj[prop]);
                j++;
            }
            break;

        default:
            //This must be a litteral (or function)
            children = obj;
            break;
    }

    return({'name': name, 'value': children, 'type': type, 'show': show});

}

function regEvents() {

    $('.header').click(function() {
        var parent = $(this).parent();

        if (parent.hasClass('closed')) {
            parent.removeClass('closed');
            parent.addClass('open');
        } else {
            parent.removeClass('open');
            parent.addClass('closed');
        }
    });
}
