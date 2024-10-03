using System;
using Microsoft.EntityFrameworkCore.Migrations;
using Npgsql.EntityFrameworkCore.PostgreSQL.Metadata;

#nullable disable

namespace Master_GCM.Migrations
{
    /// <inheritdoc />
    public partial class KAPM_DB_ASSET_DEV : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.CreateTable(
                name: "MST_EMPLOYEE",
                columns: table => new
                {
                    NIPP = table.Column<int>(type: "integer", nullable: false)
                        .Annotation("Npgsql:ValueGenerationStrategy", NpgsqlValueGenerationStrategy.IdentityByDefaultColumn),
                    NAME = table.Column<string>(type: "text", nullable: false),
                    POSITION = table.Column<string>(type: "text", nullable: false),
                    UNIT = table.Column<string>(type: "text", nullable: false),
                    DEPARTMENT = table.Column<string>(type: "text", nullable: false),
                    DIRECTORATE = table.Column<string>(type: "text", nullable: false),
                    ACTIVE = table.Column<string>(type: "text", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_MST_EMPLOYEE", x => x.NIPP);
                });

            migrationBuilder.CreateTable(
                name: "MST_GCM",
                columns: table => new
                {
                    MASTERID = table.Column<int>(type: "integer", nullable: false)
                        .Annotation("Npgsql:ValueGenerationStrategy", NpgsqlValueGenerationStrategy.IdentityByDefaultColumn),
                    CONDITION = table.Column<string>(type: "text", nullable: false),
                    NOSR = table.Column<int>(type: "integer", nullable: false),
                    DESCRIPTION = table.Column<string>(type: "text", nullable: false),
                    VALUEGCM = table.Column<int>(type: "integer", nullable: false),
                    TYPEGCM = table.Column<string>(type: "text", nullable: false),
                    ACTIVE = table.Column<string>(type: "text", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_MST_GCM", x => x.MASTERID);
                });

            migrationBuilder.CreateTable(
                name: "MST_USER",
                columns: table => new
                {
                    NIPP = table.Column<string>(type: "text", nullable: false),
                    ROLEID = table.Column<string>(type: "text", nullable: false),
                    USER_PICTURE = table.Column<string>(type: "text", nullable: false),
                    NAME = table.Column<string>(type: "text", nullable: false),
                    POSITION = table.Column<string>(type: "text", nullable: false),
                    UNIT = table.Column<string>(type: "text", nullable: false),
                    DEPARTMENT = table.Column<string>(type: "text", nullable: false),
                    DIRECTORATE = table.Column<string>(type: "text", nullable: false),
                    PASSWORD = table.Column<string>(type: "text", nullable: false),
                    ACTIVE = table.Column<string>(type: "text", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_MST_USER", x => x.NIPP);
                });

            migrationBuilder.CreateTable(
                name: "TRN_DTL_SPEC",
                columns: table => new
                {
                    IDASSETSPEC = table.Column<int>(type: "integer", nullable: false),
                    IDASSET = table.Column<int>(type: "integer", nullable: false),
                    PROCESSORBRAND = table.Column<string>(type: "text", nullable: true),
                    PROCESSORMODEL = table.Column<string>(type: "text", nullable: true),
                    PROCESSORSERIES = table.Column<string>(type: "text", nullable: true),
                    MEMORYTYPE = table.Column<string>(type: "text", nullable: true),
                    MEMORYBRAND = table.Column<string>(type: "text", nullable: true),
                    MEMORYMODEL = table.Column<string>(type: "text", nullable: true),
                    MEMORYSERIES = table.Column<string>(type: "text", nullable: true),
                    MEMORYCAPACITY = table.Column<string>(type: "text", nullable: true),
                    STORAGETYPE = table.Column<string>(type: "text", nullable: true),
                    STORAGEBRAND = table.Column<string>(type: "text", nullable: true),
                    STORAGEMODEL = table.Column<string>(type: "text", nullable: true),
                    STORAGECAPACITY = table.Column<string>(type: "text", nullable: true),
                    GRAPHICSTYPE = table.Column<string>(type: "text", nullable: true),
                    GRAPHICSBRAND = table.Column<string>(type: "text", nullable: true),
                    GRAPHICSMODEL = table.Column<string>(type: "text", nullable: true),
                    GRAPHICSSERIES = table.Column<string>(type: "text", nullable: true),
                    GRAPHICSCAPACITY = table.Column<string>(type: "text", nullable: true),
                    SCREENRESOLUTION = table.Column<string>(type: "text", nullable: true),
                    TOUCHSCREEN = table.Column<bool>(type: "boolean", nullable: true),
                    BACKLIGHTKEYBOARD = table.Column<bool>(type: "boolean", nullable: true),
                    CONVERTIBLE = table.Column<bool>(type: "boolean", nullable: true),
                    WEBCAMERA = table.Column<bool>(type: "boolean", nullable: true),
                    SPEAKER = table.Column<bool>(type: "boolean", nullable: true),
                    MICROPHONE = table.Column<bool>(type: "boolean", nullable: true),
                    WIFI = table.Column<bool>(type: "boolean", nullable: true),
                    BLUETOOTH = table.Column<bool>(type: "boolean", nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_TRN_DTL_SPEC", x => new { x.IDASSETSPEC, x.IDASSET });
                });

            migrationBuilder.CreateTable(
                name: "TRN_HIST_MAINTENANCE",
                columns: table => new
                {
                    MAINTENANCEID = table.Column<int>(type: "integer", nullable: false),
                    IDASSET = table.Column<int>(type: "integer", nullable: false),
                    PICADDED = table.Column<int>(type: "integer", nullable: false),
                    NOTES = table.Column<string>(type: "text", nullable: false),
                    DATEADDED = table.Column<DateOnly>(type: "date", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_TRN_HIST_MAINTENANCE", x => new { x.MAINTENANCEID, x.IDASSET });
                });

            migrationBuilder.CreateTable(
                name: "TRN_LOG",
                columns: table => new
                {
                    LOGID = table.Column<int>(type: "integer", nullable: false)
                        .Annotation("Npgsql:ValueGenerationStrategy", NpgsqlValueGenerationStrategy.IdentityByDefaultColumn),
                    IDASSET = table.Column<int>(type: "integer", nullable: false),
                    ROLEID = table.Column<int>(type: "integer", nullable: false),
                    ACTIONPERFORMED = table.Column<string>(type: "text", nullable: false),
                    USERADDED = table.Column<string>(type: "text", nullable: false),
                    DATEADDED = table.Column<DateOnly>(type: "date", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_TRN_LOG", x => x.LOGID);
                });

            migrationBuilder.CreateTable(
                name: "TRN_HIST_ASSET",
                columns: table => new
                {
                    IDASSETHISTORY = table.Column<int>(type: "integer", nullable: false),
                    IDASSET = table.Column<int>(type: "integer", nullable: false),
                    NIPP = table.Column<int>(type: "integer", nullable: false),
                    NAME = table.Column<string>(type: "text", nullable: false),
                    POSITION = table.Column<string>(type: "text", nullable: false),
                    UNIT = table.Column<string>(type: "text", nullable: false),
                    DEPARTMENT = table.Column<string>(type: "text", nullable: false),
                    DIRECTORATE = table.Column<string>(type: "text", nullable: false),
                    PICADDED = table.Column<string>(type: "text", nullable: false),
                    DATEADDED = table.Column<DateOnly>(type: "date", nullable: false),
                    DATEUPDATED = table.Column<DateOnly>(type: "date", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_TRN_HIST_ASSET", x => new { x.IDASSETHISTORY, x.IDASSET });
                    table.ForeignKey(
                        name: "FK_TRN_HIST_ASSET_MST_EMPLOYEE_NIPP",
                        column: x => x.NIPP,
                        principalTable: "MST_EMPLOYEE",
                        principalColumn: "NIPP",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateTable(
                name: "TRN_ASSET",
                columns: table => new
                {
                    IDASSET = table.Column<int>(type: "integer", nullable: false),
                    NIPP = table.Column<int>(type: "integer", nullable: true),
                    ASSETBRAND = table.Column<string>(type: "text", nullable: false),
                    ASSETMODEL = table.Column<string>(type: "text", nullable: false),
                    ASSETSERIES = table.Column<string>(type: "text", nullable: false),
                    ASSETSERIALNUMBER = table.Column<string>(type: "text", nullable: false),
                    ACTIVE = table.Column<string>(type: "text", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_TRN_ASSET", x => x.IDASSET);
                    table.ForeignKey(
                        name: "FK_TRN_ASSET_MST_EMPLOYEE_NIPP",
                        column: x => x.NIPP,
                        principalTable: "MST_EMPLOYEE",
                        principalColumn: "NIPP");
                    table.ForeignKey(
                        name: "FK_TRN_ASSET_TRN_LOG_IDASSET",
                        column: x => x.IDASSET,
                        principalTable: "TRN_LOG",
                        principalColumn: "LOGID",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateTable(
                name: "TRN_DTL_PICTURE",
                columns: table => new
                {
                    IDASSETPIC = table.Column<int>(type: "integer", nullable: false),
                    IDASSET = table.Column<int>(type: "integer", nullable: false),
                    ASSETPIC = table.Column<string>(type: "text", nullable: false),
                    ACTIVE = table.Column<string>(type: "text", nullable: false),
                    PICADDED = table.Column<string>(type: "text", nullable: true),
                    DATEADDED = table.Column<DateOnly>(type: "date", nullable: false),
                    PICUPDATED = table.Column<string>(type: "text", nullable: true),
                    DATEUPDATED = table.Column<DateOnly>(type: "date", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_TRN_DTL_PICTURE", x => new { x.IDASSETPIC, x.IDASSET });
                    table.ForeignKey(
                        name: "FK_TRN_DTL_PICTURE_TRN_ASSET_IDASSET",
                        column: x => x.IDASSET,
                        principalTable: "TRN_ASSET",
                        principalColumn: "IDASSET",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateTable(
                name: "TRN_DTL_SOFTWARE",
                columns: table => new
                {
                    IDASSETSOFTWARE = table.Column<int>(type: "integer", nullable: false),
                    IDASSET = table.Column<int>(type: "integer", nullable: false),
                    SOFTWARETYPE = table.Column<string>(type: "text", nullable: false),
                    SOFTWARECATEGORY = table.Column<string>(type: "text", nullable: false),
                    SOFTWARENAME = table.Column<string>(type: "text", nullable: false),
                    SOFTWARELICENSE = table.Column<string>(type: "text", nullable: false),
                    ACTIVE = table.Column<string>(type: "text", nullable: false),
                    PICADDED = table.Column<string>(type: "text", nullable: true),
                    DATEADDED = table.Column<DateOnly>(type: "date", nullable: false),
                    PICUPDATED = table.Column<string>(type: "text", nullable: true),
                    DATEUPDATED = table.Column<DateOnly>(type: "date", nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_TRN_DTL_SOFTWARE", x => new { x.IDASSETSOFTWARE, x.IDASSET });
                    table.ForeignKey(
                        name: "FK_TRN_DTL_SOFTWARE_TRN_ASSET_IDASSET",
                        column: x => x.IDASSET,
                        principalTable: "TRN_ASSET",
                        principalColumn: "IDASSET",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateIndex(
                name: "IX_TRN_ASSET_NIPP",
                table: "TRN_ASSET",
                column: "NIPP");

            migrationBuilder.CreateIndex(
                name: "IX_TRN_DTL_PICTURE_IDASSET",
                table: "TRN_DTL_PICTURE",
                column: "IDASSET");

            migrationBuilder.CreateIndex(
                name: "IX_TRN_DTL_SOFTWARE_IDASSET",
                table: "TRN_DTL_SOFTWARE",
                column: "IDASSET");

            migrationBuilder.CreateIndex(
                name: "IX_TRN_HIST_ASSET_NIPP",
                table: "TRN_HIST_ASSET",
                column: "NIPP");
        }

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropTable(
                name: "MST_GCM");

            migrationBuilder.DropTable(
                name: "MST_USER");

            migrationBuilder.DropTable(
                name: "TRN_DTL_PICTURE");

            migrationBuilder.DropTable(
                name: "TRN_DTL_SOFTWARE");

            migrationBuilder.DropTable(
                name: "TRN_DTL_SPEC");

            migrationBuilder.DropTable(
                name: "TRN_HIST_ASSET");

            migrationBuilder.DropTable(
                name: "TRN_HIST_MAINTENANCE");

            migrationBuilder.DropTable(
                name: "TRN_ASSET");

            migrationBuilder.DropTable(
                name: "MST_EMPLOYEE");

            migrationBuilder.DropTable(
                name: "TRN_LOG");
        }
    }
}
